<?php

if ( ! class_exists( 'UserGuide_Navwalker' ) ) {
    class UserGuide_Navwalker extends Walker_Nav_Menu {
        /**
         * Starts the list before the elements are added.
         *
         * The $args parameter holds additional values that may be used with the child
         * class methods. This method is called at the start of the output list.
         *
         * @since 2.1.0
         * @abstract
         *
         * @param string $output Used to append additional content (passed by reference).
         * @param int    $depth  Depth of the item.
         * @param array  $args   An array of additional arguments.
         */
        public function start_lvl( &$output, $depth = 0, $args = array() ) {
            $output .= "<div class='start_level'>";
        }

        /**
         * Ends the list of after the elements are added.
         *
         * The $args parameter holds additional values that may be used with the child
         * class methods. This method finishes the list at the end of output of the elements.
         *
         * @since 2.1.0
         * @abstract
         *
         * @param string $output Used to append additional content (passed by reference).
         * @param int    $depth  Depth of the item.
         * @param array  $args   An array of additional arguments.
         */
        public function end_lvl( &$output, $depth = 0, $args = array() ) {
            $output .= "</div>";
        }
        
        /**
         * Start the element output.
         *
         * The $args parameter holds additional values that may be used with the child
         * class methods. Includes the element output also.
         *
         * @since 2.1.0
         * @abstract
         *
         * @param string $output            Used to append additional content (passed by reference).
         * @param object $object            The data object.
         * @param int    $depth             Depth of the item.
         * @param array  $args              An array of additional arguments.
         * @param int    $current_object_id ID of the current item.
         */
        public function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
            $prefix = $this->get_number($depth);
            $title = $object->title;
            $output .= "<span class='start_el'>{$prefix} {$title}";
        }

        /**
         * Ends the element output, if needed.
         *
         * The $args parameter holds additional values that may be used with the child class methods.
         *
         * @since 2.1.0
         * @abstract
         *
         * @param string $output Used to append additional content (passed by reference).
         * @param object $object The data object.
         * @param int    $depth  Depth of the item.
         * @param array  $args   An array of additional arguments.
         */
        public function end_el( &$output, $object, $depth = 0, $args = array() ) {
            $output .= "</span>";
        }

        /**
         * Get the list number for the current item.
         * 
         * @since 1.0
         * 
         * @param int $depth Depth of the item.
         */
        private function get_number( $depth ) {
            static $numbering = array();
            if( count($numbering) <= $depth ) {
                $numbering[$depth] = 0;    
            }

            $numbering[$depth]++;

            for( $idx = $depth+1; $idx < count($numbering); $idx++) {
                $numbering[$idx] = 0;
            }

            $prefix = '';
            for( $idx = 0; $idx <= $depth; $idx++ ) {
                $prefix .= "{$numbering[$idx]}.";
            }

            return $prefix;
        }
    }
}
