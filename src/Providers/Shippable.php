<?php

namespace MatthiasMullie\CI\Providers;

use MatthiasMullie\CI\Environment;

/**
 * @see http://docs.shippable.com/ci_configure/#using-environment-variables
 *
 * @author Matthias Mullie <ci-sniffer@mullie.eu>
 * @copyright Copyright (c) 2016, Matthias Mullie. All rights reserved.
 * @license LICENSE MIT
 */
class Shippable extends None implements Environment
{
    /**
     * {@inheritdoc}
     */
    public static function isCurrent()
    {
        return getenv('SHIPPABLE') === 'true';
    }

    /**
     * {@inheritdoc}
     */
    public function getProvider()
    {
        return 'shippable';
    }

    /**
     * {@inheritdoc}
     */
    public function getRepo()
    {
        return getenv('REPOSITORY_URL');
    }

    /**
     * {@inheritdoc}
     */
    public function getSlug()
    {
        return getenv('REPO_FULL_NAME');
    }

    /**
     * {@inheritdoc}
     */
    public function getBranch()
    {
        return getenv('BRANCH');
    }

    /**
     * {@inheritdoc}
     */
    public function getPullRequest()
    {
        $pr = getenv('PULL_REQUEST');

        return $pr !== 'false' ? $pr : '';
    }

    /**
     * {@inheritdoc}
     */
    public function getCommit()
    {
        return getenv('COMMIT');
    }

    /**
     * {@inheritdoc}
     */
    public function getBuild()
    {
        return getenv('BUILD_NUMBER');
    }
}
