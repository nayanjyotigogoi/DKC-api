<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResourceResource\Pages;
use App\Models\Resource as ResourceModel;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class ResourceResource extends Resource
{
    protected static ?string $model = ResourceModel::class;
    protected static ?string $navigationIcon  = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Resources';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int    $navigationSort  = 3;

    private static array $categories = [
        'study-materials' => 'Study Materials',
        'vocabulary'      => 'Vocabulary Lists',
        'grammar'         => 'Grammar Guide',
        'korean-culture'  => 'Korean Culture',
        'practice'        => 'Practice Exercises',
        'books'           => 'Recommended Books',
        'links'           => 'Useful Links',
    ];

    private static array $types = [
        'article'  => 'Article',
        'link'     => 'External Link',
        'download' => 'Download',
        'exercise' => 'Exercise',
    ];

    private static array $difficulties = [
        'beginner'     => 'Beginner',
        'intermediate' => 'Intermediate',
        'advanced'     => 'Advanced',
    ];

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('category')
                ->required()
                ->options(self::$categories)
                ->columnSpan(1),

            Select::make('type')
                ->required()
                ->options(self::$types)
                ->default('article')
                ->columnSpan(1),

            TextInput::make('title')
                ->required()
                ->columnSpan(2),

            Textarea::make('description')
                ->rows(2)
                ->columnSpan(2),

            Select::make('difficulty')
                ->options(self::$difficulties)
                ->nullable()
                ->columnSpan(1),

            TextInput::make('author')
                ->nullable()
                ->columnSpan(1),

            TextInput::make('url')
                ->label('External URL')
                ->url()
                ->nullable()
                ->helperText('Required for type = External Link')
                ->columnSpan(2),

            MarkdownEditor::make('content')
                ->label('Content (Markdown)')
                ->helperText('For articles, guides and exercises. Leave blank for external links.')
                ->columnSpan(2),

            TextInput::make('sort_order')
                ->numeric()
                ->default(0)
                ->columnSpan(1),

            Toggle::make('is_active')
                ->label('Visible on website')
                ->default(true)
                ->columnSpan(1),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sort_order')->label('#')->sortable(),

                BadgeColumn::make('category')
                    ->enum(self::$categories)
                    ->colors([
                        'primary'   => 'study-materials',
                        'success'   => 'vocabulary',
                        'warning'   => 'grammar',
                        'danger'    => 'korean-culture',
                        'secondary' => 'practice',
                        'primary'   => 'books',
                        'success'   => 'links',
                    ]),

                TextColumn::make('title')->searchable()->sortable()->limit(50),

                BadgeColumn::make('type')
                    ->enum(self::$types)
                    ->colors(['primary' => 'article', 'warning' => 'link', 'success' => 'download', 'secondary' => 'exercise']),

                TextColumn::make('difficulty')->label('Level')->enum(self::$difficulties),

                IconColumn::make('is_active')->boolean()->label('Active'),
            ])
            ->defaultSort('category')
            ->filters([
                SelectFilter::make('category')->options(self::$categories),
                SelectFilter::make('type')->options(self::$types),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getRelations(): array { return []; }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListResources::route('/'),
            'create' => Pages\CreateResource::route('/create'),
            'edit'   => Pages\EditResource::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool  { return auth()->user()?->isAdmin() ?? false; }
    public static function canCreate(): bool   { return auth()->user()?->isAdmin() ?? false; }
    public static function canEdit($r): bool   { return auth()->user()?->isAdmin() ?? false; }
    public static function canDelete($r): bool { return auth()->user()?->isSuperAdmin() ?? false; }
}
