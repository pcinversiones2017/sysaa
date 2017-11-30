<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use App\Models\Auditoria;

class WordController extends Controller
{
    public function index()
    {
    	$wordTest = new PhpWord();

    	$auditoria = Auditoria::find(1);

		$section = $wordTest->addSection();

		$titulo = array('bold' => true, 'size' => 18, 'name' => 'Arial');
		$cuerpo = array('size' => 12);
		$parrafo = array('align'=>'center', 'spaceAfter' => 1000);

		$section->addText(strtoupper($auditoria->nombrePlanF), $titulo, $parrafo);
		$section->addText(strtoupper($auditoria->nombrePlanF), $titulo, $parrafo);
		$html = '<h1>HOLA GILMAR</h1>';
		$html .= '<p>Some well formed HTML snippet needs to be used</p>';
		$html .= '<p>With for example <strong>some<sup>1</sup> <em>inline</em> formatting</strong><sub>1</sub></p>';
		$html .= '<p>Unordered (bulleted) list:</p>';
		$html .= '<ul><li>Item 1</li><li>Item 2</li><ul><li>Item 2.1</li><li>Item 2.1</li></ul></ul>';
		$html .= '<p>Ordered (numbered) list:</p>';
		$html .= '<ol><li>Item 1</li><li>Item 2</li></ol>';
		\PhpOffice\PhpWord\Shared\Html::addHtml($section, $html);
		
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment;filename="word.docx"');

    	$objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($wordTest, 'Word2007');

    	$objectWriter->save(storage_path('word.docx'));
    	return response()->download(storage_path('word.docx'));
    }
}
