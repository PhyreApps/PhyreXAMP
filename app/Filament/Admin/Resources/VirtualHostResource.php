<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\VirtualHostResource\Pages;
use App\Filament\Admin\Resources\VirtualHostResource\RelationManagers;
use App\Models\VirtualHost;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use League\CommonMark\Node\Inline\Text;

class VirtualHostResource extends Resource
{
    protected static ?string $model = VirtualHost::class;

    protected static ?string $navigationIcon = 'heroicon-o-server-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('domain')
                    ->label('Domain')
                    ->required()
                    ->placeholder('website.local')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('document_root')
                    ->label('Document Root')
                    ->required()
                    ->placeholder('/var/www/website')
                    ->columnSpanFull(),

                Forms\Components\Select::make('php_version')
                    ->label('PHP Version')
                    ->options([
                        '8.0' => '8.0',
                        '8.1' => '8.1',
                        '8.2' => '8.2',
                    ])
                    ->required()
                    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('domain')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('document_root')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('php_version')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVirtualHosts::route('/'),
            'create' => Pages\CreateVirtualHost::route('/create'),
            'edit' => Pages\EditVirtualHost::route('/{record}/edit'),
        ];
    }
}
