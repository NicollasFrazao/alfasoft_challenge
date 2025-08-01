<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;
use App\DataTables\ContactDataTable;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(ContactDataTable $contactDataTable)
    {
        return $contactDataTable->render('contacts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $input = $request->validated();

        try
        {
            \DB::beginTransaction();
            Contact::create($input);
            \DB::commit();

            \Flash::success('Contato cadastrada com sucesso!');
            return redirect()->route('contacts.index');
        }
        catch (\Exception $error)
        {
            \Flash::error('Ocorreu um erro ao cadastrar o contato! Erro: '.$error->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $input = $request->validated();

        try
        {
            \DB::beginTransaction();
            $contact->update($input);
            \DB::commit();

            \Flash::success('Contato atualizada com sucesso!');
            return redirect()->route('contacts.index');
        }
        catch (\Exception $error)
        {
            \Flash::error('Ocorreu um erro ao atualizar o contato! Erro: '.$error->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        try
        {
            \DB::beginTransaction();
            $contact->delete();
            \DB::commit();

            \Flash::success('Contato excluído com sucesso!');
        }
        catch (\Exception $error)
        {
            \Flash::error('Ocorreu um erro ao excluir o contato! Erro: '.$error->getMessage());
        }
        
        return redirect()->route('contacts.index');
    }
}
