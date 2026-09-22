<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceItem;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::active()->with(['items' => fn ($q) => $q->active()])->get();

        return view('services.index', compact('services'));
    }

    public function showItem(ServiceItem $serviceItem)
    {
        $serviceItem->load('service');
        $relatedItems = $serviceItem->service->items()->active()->where('id', '!=', $serviceItem->id)->limit(4)->get();

        return view('services.show-item', compact('serviceItem', 'relatedItems'));
    }
}
