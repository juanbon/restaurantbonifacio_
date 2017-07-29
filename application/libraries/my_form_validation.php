 <?php if ( ! defined ( 'BASEPATH' )) exit( 'No direct script access allowed' );
class MY_Form_validation extends CI_Form_validation{

function __construct () {
parent :: __construct ();
}

/**
* Check if given date is valid
*
* Excepts dashes, spaces, forward slashes and dots as seperators.
* Leadings zeroes for days and months are optional.
* Excepts a format parameter, turning this method into a prepper.
* Use standard php date formats (ie. Ymd) for this.
*
* @param string
* @param string
* @return bool / obj
*/
function valid_date ( $str , $format = FALSE ) {
$pattern = '/^(?<day>0?[1-9]|[12][0-9]|3[01])[- \/.](?<month>0?[1-9]|1[012])[- \/.](?<year>(19|20)[0-9]{2})$/' ;
if( preg_match ( $pattern , $str , $match ) && checkdate ( $match[ 'month' ] , $match[ 'day' ] , $match[ 'year' ] ) )
{ // pattern and date are valid
if ( $format )
{ // prep date
return date ( $format , mktime ( 0 , 0 , 0 , $match[ 'month' ] , $match[ 'day' ] , $match[ 'year' ] ));
}
return TRUE ; // don't prep date
}
return FALSE ;
}

}
/* End of file MY_Form_validation.php */
/* Location: ./application/libraries/MY_form_validation.php */ 