<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class UploadDownloaFileController extends Controller
{

    public function uploadExcelCancelad(Request $request)
    {

        //parte de gravar
        $file_path = $request->file->store('public/uploads/excelImportCanceled');

        $file_name = $request->file->hashName();





        //ler o arquivo e gravar em cotas canceladas

        /*

        if (!empty($_FILES['file']['tmp_name'])) {


            if ($xlsx = \SimpleXLSX::parse($_FILES['file']['tmp_name'])) {
                //print_r($xlsx->rows());
                $linhas = $xlsx->rows();

                //echo'<pre>';
                //print_r($linhas);
            } else {
                echo \SimpleXLSX::parseError();
            }



            $primeira_linha = true;

            foreach ($linhas as $linha) {
                if ($primeira_linha == false) {
                    //echo "<pre>";
                    //print_r($linha);

                    $created_at = date("Y-m-d H:i:s");

                    $dt = str_replace(' 00:00:00', '', $linha[6]);


                    //verificando se o contrato exixte
                    $contrato_pes = $linha[3];
                    $sql = [];
                    $sql[] = "SELECT * FROM cotas_compradas WHERE contrato = '{$contrato_pes}'";

                    $result = $this->dbConn->db_query($sql);
                    $contrato_existe = false;
                    $id_associado_dono = null;
                    if ($result['success']) {
                        $rs = $this->dbConn->db_fetch_assoc($result['result']);

                        $rs['id'] = $rs['id'];
                        $rs['id_associado'] = $rs['id_associado'];
                        $id_associado_dono = $rs['id_associado'];
                        $rs['grupo'] = $rs['grupo'];
                        $rs['cota'] = $rs['cota'];
                        $rs['contrato'] = $rs['contrato'];
                        $rs['consorciado'] = $rs['consorciado'];
                        $rs['documento'] = $rs['documento'];
                        $rs['data'] = $this->dateDB2BR($rs['data']);
                        $rs['cartorio'] = $rs['cartorio'];
                        $rs['livro'] = $rs['livro'];
                        $rs['folhas'] = $rs['folhas'];

                        if($rs['contrato'] != '')
                            $contrato_existe = true;
                    }

                    //verificando se admistradora existe
                    $administradora_str = trim(strtoupper(utf8_decode($linha[0])));
                    $administradora_bd = trim(strtoupper(utf8_decode($linha[0])));

                    if (strpos($administradora_str, 'BRADESCO') !== false) {
                        $administradora_bd = 'BRADESCO';
                    }else if(strpos($administradora_str, 'BANCO DO BRASIL') !== false) {
                        $administradora_bd = 'BANCO DO BRASIL';

                    }else if(strpos($administradora_str, 'ITAU') !== false) {
                        $administradora_bd = 'ITAU';

                    }else if(strpos($administradora_str, 'PORTO SEGURO') !== false) {
                        $administradora_bd = 'PORTO SEGURO';

                    }else if(strpos($administradora_str, 'SANTANDER') !== false) {
                        $administradora_bd = 'SANTANDER';

                    }


                    if(!$contrato_existe){

                        //cadastrando cota qdo não tem no sistema
                        if($administradora_bd != 'XXXXX'){
                            $administradora = trim($administradora_bd);//strtoupper(utf8_decode($linha[0]));
                            $grupo = $linha[1];
                            $cota = $linha[2];
                            $contrato = $linha[3];
                            $consorciado = utf8_decode($linha[4]);
                            $documento = $linha[5];
                            $data = $this->dateBR2DB($dt);
                            $cartorio = utf8_decode($linha[7]);
                            $livro = utf8_decode($linha[8]);
                            $folhas = utf8_decode($linha[9]);

                            $sql = [];
                            $sql[] = "
                            INSERT INTO cotas_compradas SET
                            id_associado = '{$idassociado}'
                            ,administradora = '{$administradora}'
                            ,grupo = '{$grupo}'
                            ,cota = '{$cota}'
                            ,contrato = '{$contrato}'
                            ,consorciado = '{$consorciado}'
                            ,documento = '{$documento}'
                            ,data = '{$data}'
                            ,cartorio = '{$cartorio}'
                            ,livro = '{$livro}'
                            ,folhas = '{$folhas}'
                            ,created_at  = '{$created_at}'
                            ";

                            $this->dbConn->db_execute($sql);
                        }

                    }else{

                        //cadastrando cota duplicada de outra empresa
                        if($administradora_bd != 'XXXXX'){

                            $administradora = trim($administradora_bd);//strtoupper(utf8_decode($linha[0]));
                            $grupo = $linha[1];
                            $cota = $linha[2];
                            $contrato = $linha[3];
                            $consorciado = utf8_decode($linha[4]);
                            $documento = $linha[5];
                            $data = $this->dateBR2DB($dt);
                            $cartorio = utf8_decode($linha[7]);
                            $livro = utf8_decode($linha[8]);
                            $folhas = utf8_decode($linha[9]);

                            $sql = [];
                            $sql[] = "
                            INSERT INTO cotas_compradas_duplicadas SET
                            id_associado_dono = '{$id_associado_dono}'
                            ,id_associado = '{$idassociado}'
                            ,contrato = '{$contrato}'
                            ";

                            $this->dbConn->db_execute($sql);

                            $qtDuplicados++;

                            $listaContratosDuplicados[$linhaArray]['dono'] = 'xx';
                            $listaContratosDuplicados[$linhaArray]['contrato'] = $contrato;

                            $linhaArray++;
                        }

                    }

                }
                $primeira_linha = false;
            }

        }


        $result['success'] = true;
        $result['qtDuplicados'] = $qtDuplicados;
        $result['listaContratosDuplicados'] = $listaContratosDuplicados;

        */

        dd($file_path,$file_name);

    }

    public function downloadExcelExampleCancelad($file)
    {

        // $file = Storage::path('public/uploads/excelImportCanceled/'.$file);

        $url = Storage::url('uploads/excelImportCanceled/'.$file);
        // $url = storage_path('app/public/uploads/excelImportCanceled/'.$file);

        dd($url);

        return response()->json([
            'success' => true,
            'url_file' => $file,
        ], Response::HTTP_NOT_FOUND);

    }
}
