<?php
namespace App\Services;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

class ApiService{

    private $client;
    public const API_URL = 'http://localhost:8300/';
    public const API_URL_P = 'http://localhost:8200/api/';


    public function __construct(){
        $this->getConnection();
    }
    // metodo responsavel por fazer a conexão com api
    private function getConnection(){
        try {
            //$this->client = new Client(['base_uri ' => self::API_URL]);
            $this->client = new Client();
        } catch (Exception $e) {
            return $e-> getCode();
        }
    }
    //metodo reponsavel para retornar dados de uma requisição 
    //$endPoint é o caminho ex: api/pacotes que retorna lista de pacote
    public function get(string $endPoint){
        try {
            $requisicao = $this->client->request('GET',self::API_URL.$endPoint);
            $status = $requisicao->getStatusCode();

            return [
                'dados' => json_decode($requisicao->getBody()->getContents(), true),
                //'dados' => json_decode($requisicao->getBody()),
                'status' => $status
            ];
            
        } catch (ConnectException $e) {
            return [
                'erro' => 'Erro de Conexao com a API: ' . self::API_URL,
                'status' => $e->getCode()
            ];
        } catch (\Exception $e) {
            return [
                dd($e),
                'erro' => $e->getResponse()->getBody()->getContents(),
                'status' => $e->getCode()
            ];
        }
    }
    public function getP(string $endPoint){
        try {
            $requisicao = $this->client->request('GET',self::API_URL_P.$endPoint);
            $status = $requisicao->getStatusCode();

            return [
                'dados' => json_decode($requisicao->getBody()->getContents(), true),
                //'dados' => json_decode($requisicao->getBody()),
                'status' => $status
            ];
            
        } catch (ConnectException $e) {
            return [
                'erro' => 'Erro de Conexao com a API: ' . self::API_URL,
                'status' => $e->getCode()
            ];
        } catch (\Exception $e) {
            return [
                'erro' => $e->getResponse()->getBody()->getContents(),
                'status' => $e->getCode()
            ];
        }
    }

    public function post(string $endPoint, array $dados){
       // $uri = 'http://localhost:8200/api/'. $endPoint;
        try {
            $requisicao = $this->client->request('POST', self::API_URL.$endPoint, $dados);
            $status = $requisicao->getStatusCode();

            return [
                'dados' => $requisicao->getBody()->getContents(),
                'status' => $status
            ];

        } catch (ConnectException $e) {
            return [
                'erro' => 'Erro de Conexao com a API: ' . self::API_URL,
                'status' => $e->getCode()
            ];
        } catch (\Exception $e) {

            $errorBag = new MessageBag();
            $errorBag->merge(
                (array)json_decode($e->getResponse()->getBody()->getContents())
            );

            $erro = new ViewErrorBag();
            $erro->put('default', $errorBag);

            return [
                'erro' => $erro,
                'status' => $e->getCode()
            ];
        }
    }

    public function put(string $endPoint, array $dados){
       // $uri = 'http://localhost:8200/api/'. $endPoint;
        try {
            $requisicao = $this->client->request('PUT', self::API_URL.$endPoint, $dados);
            $status = $requisicao->getStatusCode();

            return [
                'dados' => json_decode($requisicao->getBody()->getContents(), true),
                'status' => $status
            ];
        } catch (ConnectException $e) {
            return [
                'erro' => 'Erro de Conexao com a API: ' . self::API_URL,
                'status' => $e->getCode()
            ];
        } catch (\Exception $e) {
            return [
                'erro' => $e->getResponse()->getBody()->getContents(),
                'status' => $e->getCode()
            ];
        }
    }

    public function delete(string $endPoint){
        //$uri = 'http://localhost:8200/api/'. $endPoint;
        try {
            $requisicao = $this->client->request('DELETE', self::API_URL.$endPoint);
            $status = $requisicao->getStatusCode();

            return [
                'dados' => json_decode($requisicao->getBody()->getContents(), true),
                'status' => $status
            ];
        } catch (ConnectException $e) {
            return [
                'erro' => 'Erro de Conexao com a API: ' . self::API_URL,
                'status' => $e->getCode()
            ];
        } catch (\Exception $e) {
            return [
                'erro' => $e->getResponse()->getBody()->getContents(),
                'status' => $e->getCode()
            ];
        }
    }

    
}
