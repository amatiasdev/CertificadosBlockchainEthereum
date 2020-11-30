import Certificados from "./contracts/Certificados.json";
import contract from "truffle-contract";
export default async(provider)=>{
    const Certificados =contract(Certificados);
    Certificados.setProvider(provider);

    let instance=await Certificados.deployed();

    return instance;
};