import React,{Component} from 'react'; 
import "../App.css"; 
import  "../css/bootstrap.min.css"; 
import  "../css/css.css"; 
import axios from 'axios'; 
import ipfs from '../ipfs';
import {endPointBackEnd, pageTESIOfficial} from '../utils/constants';

class firmarCert extends Component{
  constructor(props){
    super(props) 
    this.state = {
    ipfsHash: '',
    storageValue: 0,
    web3: this.props.web3, 
    account: this.props.account, 
    contract: this.props.contract, 
    buffer:null,
    cert:null, 
    certificadoUp:false, 
    transactionHash:null, 
    from:null, 
    to:null, 
    blockNumber:null, 
    folio:null, 
    loading:false, 
    net:''
    } 
    this.CertificadosContract=this.props.CertificadosContract; 
    this.captureFile = this.captureFile.bind(this); 
    this.onSubmit = this.onSubmit.bind(this); 
    this.getPDF = this.getPDF.bind(this); this.gotoCertWeb = this.gotoCertWeb.bind(this); 
  } 
    componentDidMount = async () => {}; 
    setNet(e){
      this.setState({ net:e});
      console.log(this.state.net) 
    } 
    captureFile(event) {
      event.preventDefault() 
      const file = event.target.files[0] 
      const filename=file.name.split('.png') 
      this.setState({ folio: filename[0] }); 
      const reader = new window.FileReader() 
      reader.readAsArrayBuffer(file) 
      reader.onloadend = () => {
        this.setState({ buffer: Buffer.from(reader.result) })
      } 
    } 
    getPDF(){
      const Data={folio:this.state.folio, ipfsHash:this.state.ipfsHash, txHash:this.state.transactionHash, from:this.state.from, to:this.state.to, blockNumber:this.state.blockNumber, net:this.state.net };
      console.log(Data); 
      axios({url: `${endPointBackEnd}/CertificadosBlockchainEthereum/back/preQR.php`, method: 'POST', data: Data, responseType: 'blob'}).then((response) => {     const file = new Blob([response.data], {type: 'application/pdf'}); 
     const fileURL = URL.createObjectURL(file); 
     window.open(fileURL); 
     console.log(response.data) });
    }

    onSubmit(event) {
      event.preventDefault() 
      this.setState({cert:false}) 
      this.setState({loading: true}) 
      this.state.web3.eth.net.getId().then(netId => {
      switch (netId) {
        case 1: 
          this.setNet('m'); 
          break;
        case 4: 
          this.setNet('r');
          break;
        default:
          break;
      } 
    }); 
    
    ipfs.add(this.state.buffer, (error, result) => {
      if(error) {
        console.error(error)
        return
      } 
      this.setState({ ipfsHash: result[0].hash }) 
      console.log(this.state.ipfsHash); 
      this.CertificadosContract.methods.join(this.state.ipfsHash).send({ from: this.state.account }).once('receipt', (receipt) => {
      this.setState({loading:false,cert:true, file:'', transactionHash:receipt.transactionHash,from:receipt.from,to:receipt.to,blockNumber:receipt.blockNumber})
      {this.getPDF()} }).once("error", (receipt) => {
      this.setState({loading:false, file:''}) 
      });
      })
    } 
    gotoCertWeb(event){
      event.preventDefault()
      const url=`${endPointBackEnd}/CertificadosBlockchainEthereum/back/${pageTESIOfficial}.php?hashtx="+this.state.transactionHash+"&n="+this.state.net`;
      window.open(url, '_blank');
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
      } return(
        <div className="login d-flex align-items-center py-5">
           <div className="container"> 
              <div className="row"> 
                <div className="col-md-9 col-lg-7 mx-auto"> 
                  <h3 className="login-heading mb-4">Firmar certificado académico digital</h3> 
                    <form action="#" onSubmit={this.onSubmit}> 
                      <div className="custom-file"> 
                        <input type="file" className="" id="validatedCustomFile"   required onChange={this.captureFile} key={this.state.file} /> 
                      </div>
                      {
                      this.state.loading ? 
                        <>
                        <div className="spinner-border text-primary" role="status">
										      <span className="sr-only"></span>
									      </div>
                        <div>
                          Firmando...
                        </div>  
                        </>
                        :
                        <div className="spac"> 
                          <button className="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Firmar</button> 
                        </div> 
                      }
                      
                    </form> 
                     
                    {this.state.cert && (<button className="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" onClick={this.gotoCertWeb}>Ir a Certificado</button>) } 
                    </div> </div> </div> </div> ); } } 
                    
  export default firmarCert;