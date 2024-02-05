@extends('include/mainlayout')
@section('title', 'ReportPelatihan')
@section('content')

<div class="pagetitle">
     
    <section class="section">

      <div class="row">
        <div class="col-lg-12">
        

          <div class="card">
            <div class="card-body">            
            
              <h5 class="card-title"><i class="fa-solid fa-square-poll-vertical"></i> Export PDF</h5>
              <button type="button" id="exportToPdf" class="btn bi bi-file-pdf btn-sm btn-primary"> Export PDF</button>
              <br>
            </div> 

             <table align="center" border="0" cellpadding="10" style='margin-bottom: 40px' class="tableutama">

        <tbody>
            <tr>
                <td colspan="4">
                    <table border="0" >
                        <tbody>
                            <div class="headersurat">
                            <img src="assets/img/Logo_Mi_Touch.jpg" alt="Logo Kiri" class="logosurat-left">
                            <div class="titlesurat">
                                Surat Training
                            </div>
                            <div class="contentsurat">
                               <span style="font-size: x-small;">MTBU/HCG/F-042</span><br>
                               <span style="font-size: 8px;">Printed at 2023-10-31</span>
                            </div>
                        </tbody>
                        <hr>   
                    </table>
                </td>    
                          
            </tr>
           
            <tr>
                <td colspan="3">
                    <table border="0" cellpadding="1">
                    <span style="font-size: 12px; font-weight: bold;">Diberikan kepada : </span>
                        <tbody>
                            <tr>
                                <td width="93"><span style="font-size: x-small;">NRP</span></td>
                                <td width="8"><span style="font-size: x-small;">:</span></td>
                                <td width="200"><span style="font-size: x-small;">005/ smk-if/ yps/ IV/ 2011</span></td>
                            </tr>
                            <tr>
                                <td><span style="font-size: x-small;">Nama</span></td>
                                <td><span style="font-size: x-small;">:</span></td>
                                <td><span style="font-size: x-small;">-</span></td>
                            </tr>
                            <tr>
                                <td><span style="font-size: x-small;">Departemen</span></td>
                                <td><span style="font-size: x-small;">:</span></td>
                                <td><span style="font-size: x-small;">-</span></td>
                            </tr>
                            <tr>
                                <td><span style="font-size: x-small;">Jabatan</span></td>
                                <td><span style="font-size: x-small;">:</span></td>
                                <td><span style="font-size: x-small;">-</span></td>
                            </tr>
                            <tr>
                                <td><span style="font-size: x-small;">Alamat</span></td>
                                <td><span style="font-size: x-small;">:</span></td>
                                <td><span style="font-size: x-small;">-</span></td>
                            </tr>
                            <tr>
                                <td><span style="font-size: x-small;">Telepon</span></td>
                                <td><span style="font-size: x-small;">:</span></td>
                                <td><span style="font-size: x-small;">-</span></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </td>
                
            </tr>
            <tr>
            
                <td  colspan="3"> <span style="font-size: 12px; font-weight: bold;"><hr> Keperluan : tugas </span></td>   
            </tr>
            <tr>
                <td>
                    <table border="0">
                    
                        <tbody>
                    
                            <tr>
                                <td width="74"><span style="font-size: x-small;">Tujuan</span></td>
                                <td width="2">:</td>
                                <td width="150">-</td>
                            </tr>
                            </tr>
                            <tr>
                                <td><span style="font-size: x-small;">Awal</span></td>
                                <td width="2">:</td>
                                <td width="150">-</td>
                            </tr>
                            </tr>
                            <tr>
                                <td><span style="font-size: x-small;">Akhir</span></td>
                                <td width="2">:</td>
                                <td width="150">-</td>
                            </tr>
                            </tr>
                        </tbody>
                         <hr> 
                    </table>
                </td>
                <td colspan="2">
                    <table border="0">
                     <h5></h5>
                        <tbody>
                            <tr>
                                <td width="74"><span style="font-size: x-small;">Penginapan</span></td>
                                <td width="2">:</td>
                                <td width="150">-</td>
                            </tr>
                            <tr>
                                <td><span style="font-size: x-small;">Transport</span></td>
                                <td width="2">:</td>
                                <td width="150">-</td>
                            </tr>
                            </tr>
                            <tr>
                                <td><span style="font-size: x-small;">Uang Muka</span></td>
                                <td width="2">:</td>
                                <td width="150">-</td>
                            </tr>
                            </tr>
            
                        </tbody>
                         <hr> 
                    </table>
                </td>
            </tr>
             <tr>
                <td colspan = "3" class="signature-column">
                    <table border="0">
                        <tbody>
                            <tr>
                                <td width="90"><span style="font-size: x-small;">Keterangan</span></td>
                                <td width="16">:</td>
                                <td width="0">-</td>
                            </tr>
                        </tbody>
                        
                    </table>
                </td>
                </tr>
              </tr>
            <tr>
                <td colspan="3" valign="top">
                <hr>
                    <div align="center">
                            <span style="font-size: x-small;">Persetujuan</span>
                        
                    </div>
                    <hr>
                </td>
            </tr>
           <tr>
                <td class="signature-column">
                
                    <div class="signature" align="center">
                        <br><br><br><br>
                        <span style="font-size: x-small;"> BAYU SETYAWAN</span><br>
                        <span style="font-size: x-small;"> PROJECT MANAGER</span>
                        
                    </div>
                </td>
                <td class="signature-column">
                    <div class="signature" align="center">
                       <br><br><br><br>
                        <span style="font-size: x-small;"> HCGS DEPT. HEAD</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                   <hr>
                    <div align="left">
                            <span style="font-size: x-small;">*Ruang untuk diisi oleh Divisi/JOb site/Cabang/Perwakilan ditempat tujuan</span>
                    </div>
                </td>
            </tr>
              <tr>
                <td>
                    <table border="0">
                        <tbody>
                        <hr>
                            <tr>
                                <td width="180"><span style="font-size: x-small;">Tanggal Tiba : </span></td>
                                <td width="0"></td>
                                <td width="200"><span style="font-size: x-small;">Tanggal Kembali : </span></td>
                                <td width="0"></td>
                               
                            </tr>
                            
                        </tbody>
                    </table>
                </td>
             
                <td>
                    <table colspan="2">
                    
                        <tbody>
                        
                            <tr>
                                <td width="123"><span style="font-size: x-small; margin-left:20px">   Mengetahui,</span></td>
                          
                            </tr>
                            
                        </tbody>
                        <hr>
                    </table>
                </td>
                </tr>
                <tr>
                <td class="signature-column">
                <hr>
                    <div class="signature" align="left">
                        
                        <span style="font-size: x-small;"> *catatan</span><br>
                        <span style="font-size: x-small;"> Hubungi nomer dibawah ini apabila memerlukan informasi reguler</span><br>
                        <span style="font-size: x-small;"> Palembang : 085268990753 (Reguler)</span><br>
                        <span style="font-size: x-small;"> Palembang : 085268990753 (Reguler)</span><br>
                        <span style="font-size: x-small;"> Palembang : 085268990753 (Reguler)</span><br>
                       
                        
                    </div>
                </td>
                <td class="signature-column">
                <hr>
                    <div class="signature" align="center">
                       <br><br><br><br>
                        <span><hr style="width: 150px; border-top: 2px c;"></span>
                    </div>
                </td>
            </tr>
              </tr>
            <tr>
            </tbody>
            </table>
             

         <div>

        </div>
           
      </div>
    </section>

@endsection