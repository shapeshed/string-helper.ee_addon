<?php
/** 
 * ExpressionEngine
 *
 * LICENSE
 *
 * ExpressionEngine by EllisLab is copyrighted software
 * The licence agreement is available here http://expressionengine.com/docs/license.html
 * 
 * String Helper
 * 
 * @category   Plugins
 * @package    String Helper
 * @version    0.1.0
 * @since      0.1.0
 * @author     George Ornbo <george@shapeshed.com>
 * @see        {@link http://github.com/shapeshed/string_helper.ee_addon/} 
 * @license    {@link http://opensource.org/licenses/bsd-license.php} 
 */

/**
* Plugin information used by ExpressionEngine
* @global array $plugin_info
*/
$plugin_info = array(
  'pi_name'         => 'String Helper',
  'pi_version'      => '0.1.0',
  'pi_author'       => 'George Ornbo',
  'pi_author_url'   => 'http://shapeshed.com/',
  'pi_description'  => 'Provides helper methods for manipulating strings',
  'pi_usage'        => String_helper::usage()
);

class String_helper{

  /**
  * Tag data holds the inital ExpressionEngine tag data.
  * It is then used as the array to hold parsed data and returned.
  * @var array
  * @access public
  */	
  private $tagdata;

  /**
  * Data sent back to calling function
  * @var string
  * @access public
  */	
  public $return_data;

  /**
  * CodeIgniter needs this as it is PHP4 based so doesn't get __construct()
  * @access public
  */
  public function String_helper()
  {
  	$this->__construct();
  }

  /**
  * Constructor class. Gets data from EE templates.
  * @access public
  * @return string
  */
  public function __construct() 
  {
    $this->EE =& get_instance();
    
    $this->tagdata = $this->EE->TMPL->tagdata; 
  }
  
  /**
  * addcslashes — Quote string with slashes in a C style
  * @access public
  * @return string
  * {@link http://www.php.net/manual/en/function.addcslashes.php}
  */
  public function addcslashes()
  {
    $this->addcslashes_charlist = ( ! $this->EE->TMPL->fetch_param('addcslashes_charlist')) ? false :  $this->EE->TMPL->fetch_param('addcslashes_charlist');
    if (!$this->addcslashes_charlist)
    {
      // TO DO: handle error here
    }
    else
    {
      return addcslashes($this->tagdata, $this->addcslashes_charlist);
    }
  }

  /**
  * addslashes — Quote string with slashes
  * @access public
  * @return string
  * @link {@link http://www.php.net/manual/en/function.addslashes.php}
  */		
  public function addslashes()
  {
    return addslashes($this->tagdata);
  }
  
  /**
  * bin2hex — Convert binary data into hexadecimal representation
  * @access public
  * @return string
  * @link {@link http://www.php.net/manual/en/function.bin2hex.php}
  */		
  public function bin2hex()
  {
    return bin2hex($this->tagdata);
  }
  
  /**
  * chop — Alias of rtrim()
  * The chop() function will remove a white space or other predefined character from the right end of a string.
  * @access public
  * @return string
  * @link {@link http://www.php.net/manual/en/function.chop.php}
  */		
  public function chop()
  {
    return chop($this->tagdata);
  }
  
  /**
  * chr — Return a specific character
  * @access public
  * @return string
  * @link {@link http://www.php.net/manual/en/function.chr.php}
  */		
  public function chr()
  {
    return chr($this->tagdata);
  }
  
  /**
  * chunk_split — Split a string into smaller chunks
  * @access public
  * @return string
  * @link {@link http://www.php.net/manual/en/function.chunk-split.php}
  */
  public function chunk_split()
  {
    $this->chunklen = ( ! $this->EE->TMPL->fetch_param('chunklen')) ? false :  $this->EE->TMPL->fetch_param('chunklen');
    $this->end = ( ! $this->EE->TMPL->fetch_param('end')) ? false :  $this->EE->TMPL->fetch_param('end');
    if  ($this->chunklen && $this->end)
    {
      return chunk_split($this->tagdata, $this->chunklen, $this->end); 
    }
    elseif ($this->chunklen && !$this->end)
    {
      return chunk_split($this->tagdata, $this->chunklen);      
    }
    elseif (!$this->chunklen && $this->end)
    {
      return chunk_split($this->tagdata, false, $this->end);      
    }
    else
    {
      return chunk_split($this->tagdata);      
    }
  }
  
  /**
  * str_replace — Replace all occurrences of the search string with the replacement string
  * @access public
  * @return array
  * @link {@link http://www.php.net/manual/en/function.str-replace.php}
  */
  public function str_replace()
  {
    $this->search = ( ! $this->EE->TMPL->fetch_param('search')) ? false :  $this->EE->TMPL->fetch_param('search');
    $this->replace = ( ! $this->EE->TMPL->fetch_param('replace')) ? false :  $this->EE->TMPL->fetch_param('replace');
    $this->count = ( ! $this->EE->TMPL->fetch_param('count')) ? false :  $this->EE->TMPL->fetch_param('count');
    return str_replace($this->search, $this->replace, $this->tagdata, $count);
  }
  
  /**
  * str_word_count — Return information about words used in a string
  * @access public
  * @return string
  * @link {@link http://www.php.net/manual/en/function.str-word-count.php}
  */
  public function str_word_count()
  {
    $this->format = 0;
    $this->charlist = ( ! $this->EE->TMPL->fetch_param('charlist')) ? false :  $this->EE->TMPL->fetch_param('charlist');
    return str_word_count($this->tagdata, $this->format, $this->charlist);
  }
  
  /**
  * trim — Strip whitespace (or other characters) from the beginning and end of a string
  * @link {@link http://www.php.net/manual/en/function.trim.php}
  * @access public
  * @return string
  */
  public function trim()
  {
    return trim($this->tagdata); 	
  }

  /**
  * Plugin usage documentation
  *
  * @return	string Plugin usage instructions
  */
  public function usage()
  {
    return "Alpha release. No documentation available. ";
  }
	
}

?>