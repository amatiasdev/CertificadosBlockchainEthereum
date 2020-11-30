import React,{Component} from 'react';
import getWeb3 from "../utils/getWeb3";
import CertificadosContract from '../contracts/Certificados.json';
import "../App.css";
import  "../css/bootstrap.min.css";
import  "../css/css.css";
import FirmarCert from './firmarCert';
import Pdf from './pdf';
import Kardex from './kardex';


class Background extends Component{

	constructor(props) {
    super(props)
	    this.state = {
	    	pdf:'active',
	    	firma:null,
	    	kardex:null,
	    	web3: null, 
	    	accounts: null, 
	    	contract: null, 
	    	buffer:null,
	    	cert:null,
	    }
	    this.stateFir = this.stateFir.bind(this);
	    this.stateNav = this.stateNav.bind(this);
	    this.statePDF = this.statePDF.bind(this);
	}

	componentDidMount = async () => {
    try {
      // Obtener una instancia de Web3 
      const web3 = await getWeb3();

      // Obtener cuentas de Metamask
      const accounts = (await web3.eth.getAccounts())[0];

      // Obtener instancia del smartcontract
      const networkId = await web3.eth.net.getId();
      const deployedNetwork = CertificadosContract.networks[networkId];
      const instance = new web3.eth.Contract(
        CertificadosContract.abi,
        deployedNetwork && deployedNetwork.address,
      );
     //console.log(accounts);
     this.CertificadosContract=instance;

     //Settear el estado de variables
      this.setState({ web3, account: accounts, contract: instance }  );
      
    } catch (error) {
      // Catch any errors for any of the above operations.
      alert(
        `Instale o inicie sesión en Metamask para continuar.`,
      );
      console.error(error);
    }
  };

  	stateFir(event){
  		event.preventDefault()
  		this.setState({ pdf:null,firma:'active',kardex:null })
  	}
  	stateNav(event){
  		event.preventDefault()
  		this.setState({ pdf:null,firma:null,kardex:'active' })
  	}
  	statePDF(event){
  		event.preventDefault()
  		this.setState({ pdf:'active',firma:null,kardex	:null })
  	}
	
	render(){

		return(
			<div className="container-fluid">
				<div className="row no-gutter">
			    <div className="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
				    <div className="col-md-8 col-lg-6">

						<ul className="nav nav-pills nav-fill">
						  <li className="nav-item">
						    <a className={`nav-link ${this.state.pdf}`} style={{cursor:'pointer'}} onClick={this.statePDF}>PDF</a>
						  </li>
						  <li className="nav-item">
						    <a className={`nav-link ${this.state.firma}`} style={{cursor:'pointer'}} onClick={this.stateFir}>Firmar Certificado</a>
						  </li>
						  <li className="nav-item">
						    <a className={`nav-link ${this.state.kardex}`} style={{cursor:'pointer'}} onClick={this.stateNav}>Kardex</a>
						  </li>
						</ul>
							{this.state.firma==='active' &&
								<FirmarCert 
								web3={this.state.web3} 
								account={this.state.account} 
								contract={this.state.contract}
								CertificadosContract={this.CertificadosContract}
								/>
							}
							{this.state.pdf==='active' &&
								<Pdf/>
							}
							{this.state.kardex==='active' &&
								<Kardex
									web3={this.state.web3} 
									account={this.state.account} 
									contract={this.state.contract}
									CertificadosContract={this.CertificadosContract}
								/>
							}
				    </div>
				</div>  
			</div>		    
		);
	}


}
export default Background;