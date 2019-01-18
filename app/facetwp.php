<?php
namespace App;

add_filter( 'facetwp_pager_html', function( $output, $params ) {
    $output = '<nav aria-label="Resources Pagination"><ul class="pagination mt-5">';
    $page = $params['page'];
    $i = 1;
    $total_pages = $params['total_pages'];
    $limit = ($total_pages >= 5) ? 3 : $total_pages;
    $prev_disabled = ($params['page'] <= 1) ? 'disabled' : '';
    $output .= '<li class="page-item ' . $prev_disabled . '"><a class="facetwp-page page-link" data-page="' . ($page - 1) . '">Prev</a></li>';

    $loop = ($limit) ? $limit : $total_pages;

    while($i <= $loop) {
      $active = ($i == $page) ? 'active' : '';
      $output .= '<li class="page-item ' . $active . '"><a class="facetwp-page page-link" data-page="' . $i . '">' . $i . '</a></li>';
      $i++;
    }

    if($limit && $total_pages > '3') {

      $output .= ($page > $limit && $page != ($total_pages - 1) && $page <= ($limit + 1)) ? '<li class="page-item active"><a class="facetwp-page page-link" data-page="' . $page . '">' . $page . '</a></li>' : '';
      $output .= '<li class="page-item disabled"><a class="facetwp-page page-link">...</a></li>';
      $output .= ($page > $limit && $page != ($total_pages - 1) && $page > ($limit + 1)) ? '<li class="page-item active"><a class="facetwp-page page-link" data-page="' . $page . '">' . $page . '</a></li>' : '';
      $output .= ($page > $limit && $page != ($total_pages - 1) && $page != ($total_pages - 2) && $page > ($limit + 1)) ? '<li class="page-item disabled"><a class="facetwp-page page-link">...</a></li>' : '';

      $active = ($page == ($total_pages - 1)) ? 'active' : '';
      $output .= '<li class="page-item ' . $active . '"><a class="facetwp-page page-link" data-page="' . ($total_pages - 1) .'">' . ($total_pages - 1) .'</a></li>';
    }

    $next_disabled = ($page >= $total_pages) ? 'disabled' : '';


    $output .= '<li class="page-item ' . $next_disabled . '"><a class="facetwp-page page-link" data-page="' . ($page + 1) . '">Next</a></li>';


    $output .= '</ul></nav>';

    return $output;
}, 10, 2 );
