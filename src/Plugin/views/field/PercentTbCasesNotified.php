<?php

namespace Drupal\combine_period_year\Plugin\views\field;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;

/**
 * @file
 * Defines Drupal\combine_period_year\Plugin\views\field\PercentTbCasesNotified.
 */

/**
 * Field handler to flag the node type.
 *
 * @ingroup views_field_handlers
 * @ViewsField("field_percent_tb_cases_notified")
 */
class PercentTbCasesNotified extends FieldPluginBase {

  /**
   * Sets the initial Cumulative Field data at zero.
   */
  public function query() {
  }

  /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();

    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function getValue(ResultRow $values, $field = NULL) {
    parent::getValue($values, $field);

    if (
      !empty($values->denormalized_table_field_c_newinc_value)
      &&
      !empty($values->denormalized_table_field_e_inc_num_value)
    ) {
      $value = $values->denormalized_table_field_c_newinc_value
        / $values->denormalized_table_field_e_inc_num_value;
      if (gettype($value) == 'double') {
        $value = round($value, 2);
      }

    }
    else {
      $value = $this->t('Missing fields.');
    }

    return $value;
  }

}
