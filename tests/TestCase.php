<?php

namespace poldixd\FilamentRichEditorInsertHtml\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use poldixd\FilamentRichEditorInsertHtml\FilamentRichEditorInsertHtmlServiceProvider;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            FilamentRichEditorInsertHtmlServiceProvider::class,
        ];
    }
}
