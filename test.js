const Web3 = require('web3');

function testArgentIsValidSignature() {
    const data = require("./test_params.json");
    const { rpc, abi, address, hashedMessage, signature } = data;

    const web3 = new Web3();
    web3.setProvider(rpc);
    const walletContract = new web3.eth.Contract(abi, address);

    walletContract.methods
        .isValidSignature(
            hashedMessage,
            signature
        )
        .call()
        .then(console.log);
}

testArgentIsValidSignature();
// true