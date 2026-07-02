<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Models\Member;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;
    protected static ?string $navigationIcon  = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Spotlights';
    protected static ?string $navigationGroup = 'Members';
    protected static ?int    $navigationSort  = 2;

    /** Scope to spotlight / community members only — not core team */
    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()->where('is_team', false);
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->required(),
            TextInput::make('initials')->maxLength(4)->label('Initials'),
            TextInput::make('role')->label('Role in DKC'),
            TextInput::make('department')->label('Department / Course'),
            TextInput::make('joined_month'),
            TextInput::make('joined_year')->numeric(),
            Textarea::make('quote')->label('Member Quote'),
            TextInput::make('dream')->label('Dream'),
            TextInput::make('favourite_word')->label('Favourite Korean Word'),
            TextInput::make('photo_path')->label('Photo Path'),
            TextInput::make('sort_order')->numeric()->default(0),
            Toggle::make('is_spotlight')->label('Show on Homepage Spotlight'),
            Toggle::make('is_active')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable()->weight('bold'),
                TextColumn::make('role')->label('Role'),
                TextColumn::make('department')->label('Dept / Course'),
                TextColumn::make('joined_year')->label('Year'),
                IconColumn::make('is_spotlight')->boolean()->label('Spotlight'),
                IconColumn::make('is_active')->boolean()->label('Active'),
            ])
            ->defaultSort('sort_order')
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getRelations(): array { return []; }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit'   => Pages\EditMember::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool    { return auth()->user()?->can('view members') ?? false; }
    public static function canCreate(): bool     { return auth()->user()?->can('create members') ?? false; }
    public static function canEdit($record): bool    { return auth()->user()?->can('edit members') ?? false; }
    public static function canDelete($record): bool  { return auth()->user()?->can('delete members') ?? false; }
}
