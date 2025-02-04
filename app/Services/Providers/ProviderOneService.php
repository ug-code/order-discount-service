<?php

namespace App\Services\Providers;

use App\Models\Provider;
use App\Models\Todo;
use App\Services\Providers\Contracts\ProviderServiceInterface;
use Illuminate\Support\facades\http;

class ProviderOneService implements ProviderServiceInterface
{

    public function checkTodoList(): void
    {
        /** @var Provider $provider */
        $provider = Provider::where('name', 'ProviderOne')
            ->firstOrFail();

        $list = http::withoutVerifying()->get($provider->endpoint)
            ->json();

        foreach ($list as $data) {
            (new Todo)->firstOrCreate([
                'provider_id'        => $provider->id ?? null,
                'name'               => $data['id'] ?? null,
                'level'              => $data['value'] ?? null,
                'estimated_duration' => $data['estimated_duration'] ?? null,

            ]);
        }


    }
}
