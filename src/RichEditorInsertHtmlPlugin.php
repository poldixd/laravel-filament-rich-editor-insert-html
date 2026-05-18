<?php

namespace poldixd\FilamentRichEditorInsertHtml;

use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\RichEditor\EditorCommand;
use Filament\Forms\Components\RichEditor\Plugins\Contracts\HasToolbarButtons;
use Filament\Forms\Components\RichEditor\Plugins\Contracts\RichContentPlugin;
use Filament\Forms\Components\RichEditor\RichEditorTool;
use Filament\Forms\Components\Textarea;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Tiptap\Core\Extension;

class RichEditorInsertHtmlPlugin implements HasToolbarButtons, RichContentPlugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    /**
     * @return array<Extension>
     */
    public function getTipTapPhpExtensions(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    public function getTipTapJsExtensions(): array
    {
        return [];
    }

    /**
     * @return array<RichEditorTool>
     */
    public function getEditorTools(): array
    {
        return [
            RichEditorTool::make('insertHtml')
                ->label(__('filament-rich-editor-insert-html::insert-html.tool.label'))
                ->action()
                ->icon(Heroicon::CodeBracketSquare),
        ];
    }

    /**
     * @return array<Action>
     */
    public function getEditorActions(): array
    {
        return [
            Action::make('insertHtml')
                ->label(__('filament-rich-editor-insert-html::insert-html.action.label'))
                ->modalHeading(__('filament-rich-editor-insert-html::insert-html.modal.heading'))
                ->modalSubmitActionLabel(__('filament-rich-editor-insert-html::insert-html.modal.submit'))
                ->modalWidth(Width::Large)
                ->schema([
                    Textarea::make('html')
                        ->label(__('filament-rich-editor-insert-html::insert-html.form.html.label'))
                        ->rows(12)
                        ->required(),
                ])
                ->action(function (array $arguments, array $data, RichEditor $component): void {
                    $html = trim((string) ($data['html'] ?? ''));

                    if (blank($html)) {
                        return;
                    }

                    $component->runCommands(
                        [
                            EditorCommand::make('insertContent', arguments: [$html]),
                        ],
                        editorSelection: $arguments['editorSelection'] ?? null,
                    );
                }),
        ];
    }

    /**
     * @return array<string | array<string | array<string>>>
     */
    public function getEnabledToolbarButtons(): array
    {
        return [
            ['insertHtml'],
        ];
    }

    /**
     * @return array<string>
     */
    public function getDisabledToolbarButtons(): array
    {
        return [];
    }
}
