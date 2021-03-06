<?php
namespace Psmb\Newsletter\Service\DataSource;

use Neos\Flow\Annotations as Flow;

class JsonDataSource extends AbstractDataSource
{
    /**
     * @var string
     */
    protected static $identifier = 'Json';

    /**
     * Get subscribers from an external json endpoint
     *
     * {@inheritdoc}
     */
    public function getData(array $subscription)
    {
        if (!isset($subscription['dataSourceOptions']['uri'])) {
            throw new \Exception('dataSourceOptions.uri must be set for the Json datasource' . print_r($subscription, 1));
        }
        $uri = $subscription['dataSourceOptions']['uri'];
        if (isset($subscription['dataSourceAdditionalArguments'])) {
            $uri .= strpos($uri, '?') === false ? '?' : '&';
            $uri .= http_build_query($subscription['dataSourceAdditionalArguments']);
        }
        $response = file_get_contents($uri);
        return json_decode($response, true);
    }
}
