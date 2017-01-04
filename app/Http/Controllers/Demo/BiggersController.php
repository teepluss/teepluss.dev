<?php

namespace App\Http\Controllers\Demo;

use Google\Cloud as GoogleCloud;
use App\Http\Controllers\Controller;
use Google_Service_Bigquery_QueryRequest;

class BiggersController extends Controller
{
    protected $bigQuery;

    public function __construct()
    {
        $cloud = new GoogleCloud\ServiceBuilder([
            'projectId' => 'teepluss-app1',
            'keyFilePath' => storage_path('authkey/bigquery-6bdf5d34509e.json'),
            'scopes' => [
                GoogleCloud\BigQuery\BigQueryClient::SCOPE,
                GoogleCloud\BigQuery\BigQueryClient::INSERT_SCOPE
            ]
        ]);

        $this->bigQuery = $cloud->bigQuery();
    }

    public function index()
    {
        $query = 'SELECT id, name, email FROM [teepluss-app1:users.users] WHERE name LIKE "%Pa%" GROUP BY id,name,email ORDER BY id ASC LIMIT 1000';

        $options = ['useLegacySql' => true];
        $queryResults = $this->bigQuery->runQuery($query, $options);

        return view('pages.demo.biggers.index', ['queryResults' => $queryResults]);
    }

    public function create()
    {
        $projectId = 'teepluss-app1';

        $datasetId = 'users';
        $tableId = 'users';
        $source = storage_path('bigdata/users.json');

        // determine the import options from the file extension
        $options = [];
        $pathInfo = pathinfo($source) + ['extension' => null];
        if ('csv' === $pathInfo['extension']) {
            $options['jobConfig'] = ['sourceFormat' => 'CSV'];
        } elseif ('json' === $pathInfo['extension']) {
            $options['jobConfig'] = ['sourceFormat' => 'NEWLINE_DELIMITED_JSON'];
        } else {
            throw new \InvalidArgumentException('Source format unknown. Must be JSON or CSV');
        }
        // instantiate the bigquery table service
        $bigQuery = $this->bigQuery;

        $dataset = $bigQuery->dataset($datasetId);
        $table = $dataset->table($tableId);

        // create the import job
        $job = $table->load(fopen($source, 'r'), $options);

        // poll the job until it is complete
        $backoff = new GoogleCloud\ExponentialBackoff(10);
        $backoff->execute(function () use ($job) {
            printf('Waiting for job to complete' . PHP_EOL);
            $job->reload();
            if (!$job->isComplete()) {
                throw new \Exception('Job has not yet completed', 500);
            }
        });
        // check if the job has errors
        if (isset($job->info()['status']['errorResult'])) {
            $error = $job->info()['status']['errorResult']['message'];
            printf('Error running job: %s' . PHP_EOL, $error);
        } else {
            print('Data imported successfully' . PHP_EOL);
        }
    }
}
