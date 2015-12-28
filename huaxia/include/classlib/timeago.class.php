<?php
class timeAgo
  {  
     static $timeagoObject;   
     private $rustle;
     private $unit;
     
      private function __construct()
      {
          
      }                
      private function __clone(){ }
      public static function getObject()
      {
          if(! (self::$timeagoObject instanceof self) )
                 self::$timeagoObject = new timeAgo();
               
          return self::$timeagoObject;  
      }
      private function count_int($unix_C)   // main function
      {
          if(! (isset($unix_C) || is_numeric($unix_C)) )
              return 'don t find parameter';
          $d = time()-$unix_C ;   // $d - unix time difference value 
          $d_int =(int)floor($d/60) ; // minimum unit -- minutes   unix/60
          
          $this->unit = 0 ;   // is minutes,hour or day?
          
          if($d_int < 60){   // minutes   in one hour  3600
             $this->rustle = $d_int;
             $this->unit = 1;  
             }
            else if($d_int < 720){  //hour    in one day  3600*12
                  $this->rustle = floor($d_int/60);
                  $this->unit = 2 ;
                  }   
               else if($d_int < 7200){  //day  in ten days  3600*12*10
                       $this->rustle = floor($d_int/720);
                       $this->unit = 3 ;
                       }
                   else{
                       $this->rustle = $d ;
                       $this->unit = 4 ;   
                       } 
      }
      public function piece_str($C)
      {
           $this->count_int($C);
              
           $u = ''; 
           switch( $this->unit )
           {
              case 1:
                   $u = '分';
                   break;
              case 2:
                   $u = '小时';
                   break;
              case 3:
                   $u = '天';
                   break;
              case 4:
                   $u = '';
                   break;
              case 0:
                   return '对不起，这是固定时间';     
           }
           if($this->unit < 4)
           {
           if($this->rustle > 1)
                return (string)$this->rustle.$u.'前';
           else if($this->rustle == 1)
                  return (string)$this->rustle.$u.'前';
               else
                  return '刚刚';  
           }
      }
  }
?>