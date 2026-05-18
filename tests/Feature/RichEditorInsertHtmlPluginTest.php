<?php

use poldixd\FilamentRichEditorInsertHtml\RichEditorInsertHtmlPlugin;

test('it registers an insert html tool and modal action', function () {
    $plugin = RichEditorInsertHtmlPlugin::make();

    $tools = $plugin->getEditorTools();
    $actions = $plugin->getEditorActions();

    expect($tools[0]->getName())
        ->toBe('insertHtml')
        ->and($tools[0]->getLabel())
        ->toBe('Insert HTML')
        ->and($actions)
        ->toHaveCount(1)
        ->and($actions[0]->getName())
        ->toBe('insertHtml')
        ->and($actions[0]->getLabel())
        ->toBe('Insert HTML')
        ->and($actions[0]->getModalHeading())
        ->toBe('Insert HTML')
        ->and($actions[0]->getModalSubmitActionLabel())
        ->toBe('Insert')
        ->and($plugin->getEnabledToolbarButtons())
        ->toBe([['insertHtml']]);
});

test('it provides german translations', function () {
    app()->setLocale('de');

    $plugin = RichEditorInsertHtmlPlugin::make();

    expect($plugin->getEditorTools()[0]->getLabel())
        ->toBe('HTML einfügen')
        ->and($plugin->getEditorActions()[0]->getLabel())
        ->toBe('HTML einfügen')
        ->and($plugin->getEditorActions()[0]->getModalSubmitActionLabel())
        ->toBe('Einfügen');
});

test('it can be resolved from the container', function () {
    expect(RichEditorInsertHtmlPlugin::make())
        ->toBeInstanceOf(RichEditorInsertHtmlPlugin::class);
});
