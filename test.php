<?php

require 'vendor/autoload.php';

use Web3\{
    Web3,
    Providers\HttpProvider,
    RequestManagers\HttpRequestManager,
    Contract
};

function testArgentIsValidSignature()
{
    $data = json_decode(file_get_contents(__DIR__ . '/test_params.json'), true);
    extract($data);

    $web3 = new Web3(new HttpProvider(new HttpRequestManager($rpc, "10000")));
    $wallet_contract = new Contract($web3->provider, $abi);

    $wallet_contract->at($address)->call(
        'isValidSignature',
        $hashedMessage,
        $signature,
        true,
        function ($err, $result) {
            var_dump($err);
            var_dump($result);
        }
    );
}

testArgentIsValidSignature();
// NULL
// array(1) {
//   [0]=>
//   bool(false)
// }
