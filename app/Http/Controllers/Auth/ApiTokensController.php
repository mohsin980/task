<?php

namespace App\Http\Controllers\API\v1\Auth;

use Lucid\Units\Controller;
use Illuminate\Http\Request;
use App\Features\Auth\ApiTokens\CreateApiTokenFeature;
use App\Features\Auth\ApiTokens\GetApiTokenFeature;
use App\Features\Auth\ApiTokens\DeleteApiTokenFeature;
use App\Features\Auth\ApiTokens\ListApiTokensFeature;
use App\Features\Auth\ApiTokens\VerifyApiTokenFeature;
use Bouncer;
use Jurosh\PDFMerge\PDFMerger;

class ApiTokensController extends Controller
{

    public function listApiTokens(Request $request) {
        return $this->serve(ListApiTokensFeature::class);
    }

    public function createApiToken(Request $request)
    {
        return $this->serve(CreateApiTokenFeature::class);
    }

    public function getApiToken(Request $request)
    {
        return $this->serve(GetApiTokenFeature::class);
    }

    public function deleteApiToken(Request $request)
    {
        return $this->serve(DeleteApiTokenFeature::class);
    }

    public function verifyApiToken(Request $request)
    {
        return $this->serve(VerifyApiTokenFeature::class);
    }
}
