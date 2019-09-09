<?php

namespace Drupal\combine_period_year\Plugin\views\field;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;

/**
 * @file
 * Defines Drupal\combine_period_year\Plugin\views\field\CombinePeriodYearField.
 */

/**
 * Field handler to flag the node type.
 *
 * @ingroup views_field_handlers
 * @ViewsField("field_combine_period_year_field")
 */
class CombinePeriodYearField extends FieldPluginBase {

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

    if (!empty($this->view->field['field_period']->advancedRender($values))
      && !empty($this->view->field['field_year']->advancedRender($values))) {
      $value = $this->view->field['field_period']->advancedRender($values)
        . ', ' . $this->view->field['field_year']->advancedRender($values);
    }
    else {
      $value = $this->t('Make sure the Year and Period fields are present
       in your View.');
    }


    return $value;
  }

}
