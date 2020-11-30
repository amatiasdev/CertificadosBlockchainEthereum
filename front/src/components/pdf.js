import React,{Component} from 'react';
import "../App.css";
import  "../css/bootstrap.min.css";
import  "../css/css.css";
import axios from 'axios';
import { endPointBackEnd } from '../utils/constants';
 
class Pdf extends Component{

	constructor(props) {
    super(props)
	    this.state = {
	    	matricula:null,
	    	conNo:null,
			libro:null,
			fojas:null,
			folio:null,
			error:false,
			loading: false,
			errorText:null
	    }

	    this.getPDF = this.getPDF.bind(this);
	}

  	getPDF(event){
		
		  event.preventDefault();
		  if(this.state.matricula !==null && this.state.conNo !==null && this.state.libro !==null && this.state.fojas !==null && this.state.folio !==null){
			
			this.setState({ error: false, loading: true, errorText:null });
			const Data={
				ma:this.state.matricula,
				conNo:this.state.conNo,
				libro:this.state.libro,
				fojas:this.state.fojas,
				folio:this.state.folio
			}; 
			axios({ 
				url: `${endPointBackEnd}/CertificadosBlockchainEthereum/back/checkmatricula.php`,
				method: 'POST',
				data: {ma:this.state.matricula}	
			  }).then((response) => { 
				if(response.data){
					if(typeof response.data ==='string' && response.data.includes("Fallo al conectar a MySQL")){
						this.setState({ error: true, errorText: 'No hay conexión con la Base de Datos' })
					}else{
						axios({
						url: `${endPointBackEnd}/CertificadosBlockchainEthereum/back/reg.php`,
						method: 'POST',
						data: Data,
						responseType: 'blob'  
						}).then((response) => {
						
						const url = window.URL.createObjectURL(new Blob([response.data]));
						const link = document.createElement('a');
						link.href = url;
						link.setAttribute('download', this.state.folio+'.png');
						document.body.appendChild(link);
						link.click(); 
						}); 
						axios({
				
						url: `${endPointBackEnd}/CertificadosBlockchainEthereum/back/registrarCert.php`,
						method: 'POST',
						data: Data,
						responseType: 'blob', 	
						}).then((response) => { 
							const file = new Blob(
							[response.data], 
							{type: 'application/pdf'});
							const fileURL = URL.createObjectURL(file);
							window.open(fileURL); 
						});
					}
				}else{
					this.setState({ error: true, errorText: 'No se encuentra la matrícula' })
				} 
			  }).catch(error =>{
				  console.log(error); 
				  this.setState({ error: true, errorText: 'Ocurrió un error. Si el error persiste contacte al Administrador'})
			  });

			  this.setState({ loading: false })
		  }else{
			this.setState({ error: true, errorText: 'Complete todos los campos.'})
		  }
		
  }

	render(){
		return(
			<div className="login d-flex align-items-center py-5">
		    	<div className="container">
			    	<div className="row">
						<div className="col-md-9 col-lg-8 mx-auto">
			             	<h3 className="login-heading mb-4">Generar certificado académico</h3>
			          		<form>
			            		<div className="form-label-group">
			              			<input type="tel" id="matricula" name="ma" className="form-control" 
			              				placeholder="Matricula" required autoComplete="off"  autoFocus										
    									onChange={e => this.setState({ matricula: e.target.value })}
			              			/>
			              			<label htmlFor="matricula">Matricula</label>
			            		</div>
				                <div className="text-center">
				                  Registrado en el departamento de control escolar
				                </div>
				                <div className="form-label-group">
				                  <input type="tel" id="ConNo" name="conNo" className="form-control" placeholder="Con No." required autoComplete="off"
										onChange={e => this.setState({ conNo: e.target.value })}
				                  />
				                  <label htmlFor="ConNo">Con No.</label>
				                </div>
				                <div className="form-label-group">
				                  <input type="tel" id="libro" name="libro" className="form-control" placeholder="Libro" required autoComplete="off" 
				                  		onChange={e => this.setState({ libro: e.target.value })}	
				                  />
				                  <label htmlFor="libro">Libro</label>
				                </div>
				                <div className="form-label-group">
				                  <input type="tel" id="Fojas" name="fojas" className="form-control" placeholder="A Fojas" required autoComplete="off" 
				                  		onChange={e => this.setState({ fojas: e.target.value })}
				                  />
				                  <label htmlFor="Fojas">A Fojas</label>
				                </div>
				                <div className="form-label-group">
				                  <input type="tel" id="folio" name="folio" className="form-control" placeholder="Folio" required autoComplete="off" 
				                  		onChange={e => this.setState({ folio: e.target.value })}
				                  />
				                  <label htmlFor="folio">Folio</label>
				                </div>
								{
									this.state.loading 
									?
									<>
									<div className="spinner-border text-primary" role="status">
										<span className="sr-only"></span>
									</div>
									<div>
									Cargando...
									</div>  
									</>
									:
									<button className="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit"
									onClick={this.getPDF}>Registrar</button>
								}  
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
export default Pdf;