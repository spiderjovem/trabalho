
<?php
   class html {
     
       function _toString() {
              return "<html></html>";
     }
   }

   class head {
     
    function _toString() {
           return "<head></head>";
  }
}

class body{
     
    function _toString() {
           return "<body></body>";
  }
}
class title {
    private $classCss;
    private $title;

      function _contruct($class, $title) {
          $this->css = $class;
          $this->title = $title;
     }
     function _toString() {
            return "<title class\"{$this->css}\">{$this->title}</title>";
   }
 }
 class meta {
    private $charset;

      function _contruct($charset) {
         $this->charset = $charset;
     }
     function _toString() {
            return "<meta charset\"{$this->charset}\" >";
   }
 }
 class meta2 {
    private $http;
    private $content;

      function _contruct($http, $content) {
         $this->http = $http;
         $this->content = $content;
     }
     function _toString() {
            return "<meta http\"{$this->http}\" content\"{$this->content}\" >";
   }
 }

 class meta3 {
    private $name;
    private $content;

      function _contruct($name, $content) {
         $this->name = $name;
         $this->content = $content;
     }
     function _toString() {
            return "<meta name\"{$this->name}\" content\"{$this->content}\" >";
   }
 }