<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use App\Models\Post;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget as BaseStatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseStatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $unreadMessages = Contact::where('is_read', false)->count();
        $totalMessages = Contact::count();
        $totalPosts = Post::count();
        $activeServices = Service::where('is_active', true)->count();

        return [
            Stat::make('Pesan Belum Dibaca', $unreadMessages)
                ->description("{$totalMessages} total pesan masuk")
                ->icon('heroicon-o-envelope')
                ->color($unreadMessages > 0 ? 'warning' : 'success')
                ->url('/admin/contacts'),

            Stat::make('Artikel Blog', $totalPosts)
                ->description('Total artikel dipublikasikan')
                ->icon('heroicon-o-document-text')
                ->color('info')
                ->url('/admin/posts'),

            Stat::make('Layanan Aktif', $activeServices)
                ->description('Layanan yang ditampilkan di website')
                ->icon('heroicon-o-briefcase')
                ->color('primary')
                ->url('/admin/services'),
        ];
    }
}
