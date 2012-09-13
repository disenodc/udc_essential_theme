<?php

/**
 * PersonaComisionDirectiva form base class.
 *
 * @method PersonaComisionDirectiva getObject() Returns the current form's model object
 *
 * @package    tesina_udc
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePersonaComisionDirectivaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_persona_comision_directiva' => new sfWidgetFormInputHidden(),
      'ejercicio_economico_id'        => new sfWidgetFormInputHidden(),
      'puesto_id'                     => new sfWidgetFormInputHidden(),
      'nombre_y_apellido'             => new sfWidgetFormInputText(),
      'telefono'                      => new sfWidgetFormInputText(),
      'email'                         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_persona_comision_directiva' => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdPersonaComisionDirectiva()), 'empty_value' => $this->getObject()->getIdPersonaComisionDirectiva(), 'required' => false)),
      'ejercicio_economico_id'        => new sfValidatorPropelChoice(array('model' => 'EjercicioEconomico', 'column' => 'id_ejercicio_economico', 'required' => false)),
      'puesto_id'                     => new sfValidatorPropelChoice(array('model' => 'PuestoComisionDirectiva', 'column' => 'id_puesto_comision_directiva', 'required' => false)),
      'nombre_y_apellido'             => new sfValidatorString(array('max_length' => 60)),
      'telefono'                      => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'email'                         => new sfValidatorString(array('max_length' => 45, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('persona_comision_directiva[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PersonaComisionDirectiva';
  }


}
