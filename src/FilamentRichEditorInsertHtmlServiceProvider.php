<?php

namespace poldixd\FilamentRichEditorInsertHtml;

use Illuminate\Support\ServiceProvider;

class FilamentRichEditorInsertHtmlServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'filament-rich-editor-insert-html');

        $this->publishes([
            __DIR__.'/../lang' => $this->app->langPath('vendor/filament-rich-editor-insert-html'),
        ], 'filament-rich-editor-insert-html-translations');
    }
}
