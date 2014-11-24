<?php 
require_once 'include/dataOOP.inc.php';
require_once 'OOP/Classes/GalleryImageComment.php';
require_once 'OOP/Classes/GalleryImage.php';
/**
 * Helperklasse
 *
 * Von dieser Klasse kann über extends geerbt werden. Übernimmt die Constructor
 * fähigkeiten, Rendert Objekte und bietet Magic Call für GetParam an.
 * 
 * @author  Krabat Rombach
 */
class Helper
{
	private $_Data = array();
	
	/**
	 * Konstruktor
	 * Kann entweder ein Array, oder eine UID entgegen nehmen. 
	 * Wird ein Array übergeben, werden die gegebenen Werte als Daten genommen
	 * 
	 * Bei übergabe einer UID werden die Daten geladen.
	 * @param mixed $Init | array oder int
	 * @return new self
	 */
	public function __construct($Init = null)
	{
		//var_dump($Init);
		
		if(is_null($Init))
			return;
		if(is_array($Init))
			$this->_Data = $Init;
		else
		{
			switch(get_class($this))
			{
				case 'GalleryImageComment':
					$this->_Data = Data::GetComment($Init);
					break;
				
				case 'GalleryImage':
					$this->_Data = Data::GetImageData($Init);
					break;
			}
		}
	}
	
	/**
	 * Render Methode der Klassen
	 * @return string
	 */
	public function Render()
	{
		// Alle ausgabe die nun geschehen, werden im Buffer abgefangen
		ob_start();
		// Einbinden der View
		if(is_file($file = dirname(dirname(__FILE__)).'/View/'.get_class($this).'.phtml'))
			include $file;
		else 
			echo '<pre>' . print_r($this, true) . '</pre>';
		// Abspeichern aller Ausgaben die seit ob_start waren in $str
		$str = ob_get_contents();
		// Output Buffer leehren
		ob_end_clean();
		// Rückgabe des Strings
		return $str;
	}
	
	
	
	/**
	 * Magic Function __call
	 * Versucht für alle Get Methoden einen Wert zurück zu liefern.
	 * 
	 * @param string $func Der String mit dem Methoden Namen
	 * @param array $args der übergebenen Argumente
	 */
	public function __call($func, $args)
	{
		if(substr(ucfirst($func),0,3) == 'Get')
		{
			$key = strtolower(substr($func, 3));
			if(isset($this->_Data[$key]))
			{
				return $this->_Data[$key];
			}
			
			$key = strtolower(preg_replace('/\B([A-Z])/', '_$1', substr($func, 3)));
			if(isset($this->_Data[$key]))
				return $this->_Data[$key];
			
			return false;
		}
		return false;
	}
}
