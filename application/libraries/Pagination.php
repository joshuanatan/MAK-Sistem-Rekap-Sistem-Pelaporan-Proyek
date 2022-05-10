<?php
defined("BASEPATH") or exit("No Direct Script");
class CI_Pagination
{
  public function generate_pagination_rules($current, $total_data, $dpp)
  {
    #dpp = data per page
    $page_rules = array(
      "previous" => false,
      "next" => false,
      "current" => false,
      "before" => false,
      "after" => false,
      "last" => false,
      "first" => false
    );
    if ($current != "" && is_numeric($current)) {
      $page_rules["current"] = $current;
      if ($total_data != "" && is_numeric($total_data) && $dpp != "" && is_numeric($dpp)) {
        $page_amount = ceil($total_data / $dpp);
        $page_rules["previous"] = $current > 1;
        $page_rules["next"] = $current < $page_amount;

        if ($page_rules["previous"]) {
          $page_rules["before"] = $current - 1;
        }
        if ($page_rules["next"]) {
          $page_rules["after"] = $current + 1;
        }
        if ($current + 1 < $page_amount) {
          $page_rules["last"] = $page_amount;
        }
        if ($current - 1 > 1) {
          $page_rules["first"] = 1;
        }
      }
    }
    return $page_rules;
  }
}
