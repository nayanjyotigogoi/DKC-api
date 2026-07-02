<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FunFactResource\Pages;
use App\Models\FunFact;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class FunFactResource extends Resource
{
    protected static ?string $model = FunFact::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('type')
                    ->options([
                        'fun_fact'     => 'Fun Fact',
                        'did_you_know' => 'Did You Know',
                    ]),
                TextInput::make('korean_word'),
                TextInput::make('romanized'),
                Textarea::make('fact')->required()->columnSpanFull(),
                Toggle::make('is_active')->default(true),
                TextInput::make('sort_order')->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                BadgeColumn::make('type')
                    ->colors([
                        'success' => 'fun_fact',
                        'warning' => 'did_you_know',
                    ]),
                TextColumn::make('korean_word'),
                TextColumn::make('romanized'),
                TextColumn::make('fact')->limit(60),
                IconColumn::make('is_active')->boolean(),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options([
                        'fun_fact'     => 'Fun Fact',
                        'did_you_know' => 'Did You Know',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListFunFacts::route('/'),
            'create' => Pages\CreateFunFact::route('/create'),
            'edit'   => Pages\EditFunFact::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool { return auth()->user()?->can('view fun_facts') ?? false; }
    public static function canCreate(): bool  { return auth()->user()?->can('create fun_facts') ?? false; }
    public static function canEdit($record): bool   { return auth()->user()?->can('edit fun_facts') ?? false; }
    public static function canDelete($record): bool { return auth()->user()?->can('delete fun_facts') ?? false; }
}
