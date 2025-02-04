<?php

namespace App\Services\Providers;

use App\Models\Provider;
use App\Models\Todo;
use App\Services\Providers\Contracts\ProviderServiceInterface;
use Illuminate\Support\facades\http;

class ProviderTwoService implements ProviderServiceInterface
{

    public function checkTodoList()
    {

        /** @var Provider $provider */
        $provider = Provider::where('name', 'ProviderTwo')
            ->firstOrFail();

        $list = http::withoutVerifying()->get($provider->endpoint)
            ->json();


        foreach ($list as $data) {

            (new Todo)->firstOrCreate([
                'provider_id'        => $provider->id ?? null,
                'name'               => $data['id'] ?? null,
                'level'              => $data['zorluk'] ?? null,
                'estimated_duration' => $data['sure'] ?? null,
            ]);
        }


    }
}
