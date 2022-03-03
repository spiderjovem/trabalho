<?php
final class STable {
    
      const EOF_LINE = "\n";
      private $_node_id = 0;
      private $_table;
      private $_thead = array();
      private $_tr = array();
      public $attributes;
      public $border = 0;
      public $cellpadding = 3;
      public $cellspacing = 0;
      public $class;
      public $id;
      public $width;

      public function  __construct($id = null) {
          
            $this->id = $id;
      }

      private function _formatAttributeClass($class = null) {
            return $class ? " class=\"{$class}\"" : null;
      }

      private function _formatAttributes($attributes = null) {
            return $attributes ? " {$attributes}" : null;
      }

    
      private function _getNodeId() {
        
            return $this->_node_id;
      }

   
      private function _setNodeId() {
            
            $this->_node_id++;
      }

      private function _getTbody() {
            $html = null;

            foreach($this->_tr as $tr) {
              
                  $html .= "{$tr}</tr>" . self::EOF_LINE;
            }

            return $html;
      }
      private function _getThead() {
            $html = null;

            foreach($this->_thead as $thead) {
                 
                  $html .= "{$thead}</thead>" . self::EOF_LINE;
            }

            return $html;
      } 
      public function td($text = null, $class = null, $attributes = null) {
         
            $this->_tr[$this->_getNodeId()] .= "<td{$this->_formatAttributeClass($class)}{$this->_formatAttributes($attributes)}>"
                  . "{$text}</td>" . self::EOF_LINE;

            return $this;
      }
      public function th($text = null, $class = null, $attributes = null) {
            $this->_thead[$this->_getNodeId()] .= "<th{$this->_formatAttributeClass($class)}{$this->_formatAttributes($attributes)}>"
                  . "{$text}</th>" . self::EOF_LINE;

            return $this;
      }
      public function thead($class = null, $attributes = null) {
            $this->_setNodeId();
            $this->_thead[$this->_getNodeId()] = "<thead{$this->_formatAttributeClass($class)}{$this->_formatAttributes($attributes)}>"
                  . self::EOF_LINE;

            return $this;
      }

      public function tr($class = null, $attributes = null) {
            $this->_setNodeId();
            $this->_tr[$this->_getNodeId()] = "<tr{$this->_formatAttributeClass($class)}{$this->_formatAttributes($attributes)}>"
                  . self::EOF_LINE;

            return $this;
      }


      public function getTable() {
   
            return "<table border=\"{$this->border}\""
                  
                  . ( $this->id ? " id=\"{$this->id}\"" : null ) . $this->_formatAttributeClass($this->class)
                  . $this->_formatAttributes($this->attributes)
                  . ( $this->width ? " width=\"{$this->width}\"" : null )
                  . " cellpadding=\"{$this->cellpadding}\" cellspacing=\"{$this->cellspacing}\">" . self::EOF_LINE
                  . $this->_getThead() . $this->_getTbody()
                  . $this->_table
                  . "</table>" . self::EOF_LINE;
      }
}