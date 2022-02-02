const CryptoJS = require("crypto-js")

export function useCryptoGenerator(code)
{
    const secretKey = process.env.SECRET_KEY
    
    const encode = CryptoJS.AES.encrypt(JSON.stringify(code), secretKey).toString()
    const bytes  = CryptoJS.AES.decrypt(encode, secretKey);
    const decode = JSON.parse(bytes.toString(CryptoJS.enc.Utf8))

    return {encode, decode}
}