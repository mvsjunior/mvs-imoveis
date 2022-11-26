<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Property;

class PropertyController extends Controller
{
    private $execResult = ['error' => false, 'message' => ''];
    
    const UPDATE_RULES = [
                            'title'       => 'max:100',
                            'description' => 'max:200',
                            'addr_cep'    => 'max:8',
                            'addr_number' => 'max:15',
                            'complement'  => 'max:50'
    ];

    const SELECT_RULES = [
        'id'          => 'required|
                          max:100000|
                          exists:properties:id'
    ];

    const CREATE_RULES = [
                            'title'       => 'required|max:100',
                            'description' => 'max:200',
                            'addr_cep'    => 'max:8',
                            'addr_number' => 'max:15',
                            'complement'  => 'max:50'
    ];

    public function validatePropertiesParam(Request $request, $rules):array
    {
        $execResult['error']   = false;
        $execResult['message'] = '';

        try
        {
            $requestParamsValidate = $request->validate($rules);
        }
         catch (ValidationException $e) 
        {
            $execResult['error']   = true;
            $execResult['message'] = $e->errors();

            return $execResult;
        }

        return $execResult;
    }

    // ------------------------------------------------------
    //   Index, retorna uma lista com os imóveis registrados
    // ------------------------------------------------------
    public function index()
    {
        $this->execResult['properties'] = Property::all();

        return response()->json($this->execResult);
    }

    // ------------------------------------------------
    //      Registro de um novo imóvel
    // ------------------------------------------------
    public function create(Request $request)
    {
        $execResult = $this->validatePropertiesParam($request, self::CREATE_RULES);

        if($execResult['error'])
        {
            return response()->json($execResult);
        }
        
        $property = new Property();

        $property->title       = empty($request->title)       ? "" : $request->title;
        $property->description = empty($request->description) ? "" : $request->description;
        $property->addr_cep    = empty($request->addr_cep)    ? "" : $request->addr_cep;
        $property->addr_number = empty($request->addr_number) ? "" : $request->addr_number;
        $property->complement  = empty($request->complement)  ? "" : $request->complement;
        $property->bedrooms    = empty($request->bedrooms)    ? 0  : (integer) $request->bedrooms;
        $property->rooms       = empty($request->rooms)       ? 0  : (integer) $request->rooms;
        $property->garage      = empty($request->garage)      ? 0  : (integer) $request->garage;
        $property->pool        = empty($request->pool)        ? 0  : (integer) $request->pool;
        $property->images      = empty($request->images)      ? json_encode([]) : $request->images;

        if($property->save())
        {
            $this->execResult['message'] = 'Imovel cadastrado com sucesso';
            return response()->json($this->execResult);
        }

        return response()->json($this->execResult);
    }

    // ------------------------------------------------
    //      Seleção de Imóveis registrados
    // ------------------------------------------------
    public function select(Request $request)
    {
        $property = Property::find($request->id);

        if(empty($property))
        {
            $this->execResult['error']   = true;
            $this->execResult['message'] = 'Não foi encontrado nenhum imóvel com a id informada.';

            return response()->json($this->execResult);
        }

        $this->execResult['property'] = $property;

        return response()->json($this->execResult);
    }

    // ------------------------------------------------
    //      Atualização de Imóveis registrados
    // ------------------------------------------------
    public function update(Request $request)
    {
        // return [error => bool, message => '']
        $execResult = $this->validatePropertiesParam($request, self::UPDATE_RULES);
        
        if($execResult['error'])
        {
            return response()->json($execResult);
        }

        Property::where('id', $request->id)
                  ->update($request->all());

        return response()->json($execResult);
    }

    // ------------------------------------------------
    //      Remoção de imóveis
    // ------------------------------------------------
    public function delete(Request $request)
    {
        $property = Property::find($request->id);

        // validação da requisição
        if(empty($property))
        {
            $this->execResult['error']   = true;
            $this->execResult['message'] = "Nao foi encontrado um imovel com a id informada.";

            return response()->json($this->execResult);
        }

        // validação da ação de exclusão do registro
        if($property->delete())
        {
            $this->execResult['message'] = "O imóvel de id {$request->id} foi deletada com sucesso.";
            return response()->json($this->execResult);
        }

        $this->execResult['error']   = true;
        $this->execResult['message'] = "Falha ao deletar o registro.";

        return response()->json($this->execResult);
    }
}