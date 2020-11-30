import React,{Component} from 'react';
import "../App.css";
import  "../css/bootstrap.min.css";
import  "../css/css.css";
import axios from 'axios'; 
import { endPointBackEnd } from '../utils/constants';

class Kardex extends Component{

	constructor(props) {
    super(props)
	    this.state = {
	    	pdf:null,
	    	firma:'active',
	    	qr:null,
			matricula:null, 
			ipfsHash: '',
			storageValue: 0,
			web3: this.props.web3, 
			account: this.props.account, 
			contract: this.props.contract,
			from:null, 
			to:null, 
			blockNumber:null, 
			folio:null, 
			loading:false, 
			net:'',
			buffer:null,
			error:false,
			errorText:null
	    }
		this.CertificadosContract=this.props.CertificadosContract; 
	    this.getKardex = this.getKardex.bind(this);
	}

	componentDidMount = async () => {
    	
  	};

  	 getKardex(event){
  	 	event.preventDefault();
			const Data={
				ma:this.state.matricula 
			};  
			axios({ 
				url: `${endPointBackEnd}/CertificadosBlockchainEthereum/back/checkmatricula.php`,
				method: 'POST',
				data: {ma:this.state.matricula}	
				}).then((response) => { 
					if(response.data){
						if(typeof response.data ==='string' && response.data.includes("Fallo al conectar a MySQL")){
							this.setState({ error: true, errorText: 'No hay conexión con la Base de Datos' });
						}else{
							axios({
								url: `${endPointBackEnd}/CertificadosBlockchainEthereum/back/kardexpdf.php`,
								method: 'POST',
								data: Data,
								responseType: 'blob', 
								}).then((response) => {
								
									const file = new Blob( [response.data],  {type: 'application/pdf'});
									const fileURL = URL.createObjectURL(file);
									window.open(fileURL); 
									// const reader = new window.FileReader();
									// reader.readAsArrayBuffer(file); 
									// reader.onloadend = () => { 
							
									// 	this.state.web3.eth.net.getId().then(netId => {
									// 		switch (netId) {
									// 		case 1: this.setState({ net:'m'});
									// 		break 
									// 		case 4: this.setState({ net:'r'});
									// 		break 
									// 		} 
									// 	});  
							
									// 	ipfs.add(Buffer.from(reader.result), (error, result) => {
									// 		if(error) {
									// 			console.error(error)
									// 			return
									// 		} 
								
									// 		this.setState({ ipfsHash: result[0].hash })  
									// 		this.CertificadosContract.methods.join(this.state.ipfsHash).send({ from: this.state.account }).once('receipt', (receipt) => {
									// 		const newData = { ipfsHash: result[0].hash, txHash:receipt.transactionHash, from:receipt.from, to:receipt.to, blockNumber:receipt.blockNumber};
									// 		axios({ 
									// 			url: `${endPointBackEnd}/CertificadosBlockchainEthereum/back/firmarkardex.php`,
									// 			method: 'POST',
									// 			data: newData,
									// 			responseType: 'blob', 	
									// 			}).then((response) => { 
									// 				const file = new Blob(
									// 				[response.data], 
									// 				{type: 'application/pdf'});
									// 				const fileURL = URL.createObjectURL(file);
									// 				window.open(fileURL); 
									// 			});
								
									// 		this.setState({loading:false,cert:true, file:'', transactionHash:receipt.transactionHash,from:receipt.from,to:receipt.to,blockNumber:receipt.blockNumber})
											
									// 		}).once("error", (receipt) => {
									// 			this.setState({loading:false, file:''}) 
									// 		});
									// 	})
									// }
								});
							}
					}else{
						this.setState({ error: true, errorText: 'No se encuentra la matrícula' })
					}
				}).catch(error =>{  
					this.setState({ error: true, errorText: 'Ocurrió un error. Si el error persiste contacte al Administrador'})
				}); 
  }
 
	render(){
		if (!this.state.web3) {
			return <div className="login d-flex align-items-center py-5">
					 <div className="container"> 
						<div className="row"> 
						  <div className="col-md-9 col-lg-8 mx-auto"> 
								<div>
									Es necesario que inicie sesión en MetaMask
								</div> 
								<div>
									<a href="https://metamask.io/download.html">Instalar Metamask</a>
								</div> 
						  </div>
						</div> 
					  </div> 
					</div>; 
		}
		return(
			<div className="login d-flex align-items-center py-3">
		    	<div className="container">
			    	<div className="row">
						<div className="col-md-9 col-lg-8 mx-auto">
			             	<h3 className="login-heading mb-4">Kardex Académicos</h3>
			          		<form action="registrarCert.php" method="POST">
			            		<div className="form-label-group">
			              			<input type="tel" id="matricula" name="ma" className="form-control" 
			              				placeholder="Matricula" required autoComplete="off"  autoFocus										
    									onChange={e => this.setState({ matricula: e.target.value })}
			              			/>
			              			<label htmlFor="matricula">Matricula</label>
			            		</div>
				                
				                <button className="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit"

				                	onClick={this.getKardex}>Generar Kardex</button>
								{
									this.state.error && 
									<div className="alert alert-danger" role="alert">
										{this.state.errorText}
									</div>
								}
				            </form>
			            </div>	
            		</div>	
            	</div>	
            </div>				    
		);
	}

}
export default Kardex;