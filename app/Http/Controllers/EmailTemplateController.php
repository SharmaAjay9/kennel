<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use Validator;
use Redirect;

class EmailTemplateController extends Controller
{
    private $rules = array();
    private $messages = array();

    public function __construct()
    {
        $this->rules = [
            'subject'   => ['required','max:255'],
            'body'      => ['required'],
        ];

        $this->messages = [
            'subject.required'  => translate('Email subject is required'),
            'subject.max'       => translate('Max 255 characters'),
            'body.required'     => translate('Email Body is required'),
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email_templates = EmailTemplate::all();
        return view('admin.settings.email_templates.index', compact('email_templates'));
    }

    public function update(Request $request)
    {
        $rules      = $this->rules;
        $messages   = $this->messages;
        $validator  = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            flash(translate('Something went wrong'))->error();
            return Redirect::back()->withErrors($validator);
        }

        $email_template             = EmailTemplate::where('identifier', $request->identifier)->first();
        $email_template->subject    = $request->subject;
        $email_template->body       = $request->body;
        if ($request->status == 1) {
            $email_template->status = 1;
        }
        else{
            $email_template->status = 0;
        }

        if($email_template->save()){
            flash(translate('Email Template has been updated successfully'))->success();
            return back();
        } else {
            flash(translate('Sorry! Something went wrong.'))->error();
            return back();
        }

    }

   
}
