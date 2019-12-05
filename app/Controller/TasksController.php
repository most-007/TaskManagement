<?php
App::uses('AppController', 'Controller');
/**
 * Surveys Controller
 */
class TasksController extends AppController
{

/**
 * Scaffold
 *
 * @var mixed
 */
    // public $scaffold;

    public $components = array('Paginator');

    public function index()
    {
        //check user logged in
        if (!$this->Auth->user()) {
            return $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }
     
        $this->set('tasks', $this->Task->find('all', array(
            'conditions' => array(
            'Task.user_id' => $this->Auth->user('id'))),$this->Paginator->paginate()));
        
    }

    public function add()
    {
      
    }

    public function view($id = null)
    {

        // if ($this->Auth->user('type') == 'normal') {
        //     return $this->redirect(array('controller' => 'surveys', 'action' => 'index'));
        // }
        if (!$this->Task->exists($id)) {
            throw new NotFoundException(__('Invalid Task'));
        }
        $options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
        $this->set('task', $this->User->find('first', $options));        

      
    }

    public function take($id)
    {
        if (in_array($this->Auth->user('type'), ['admin', 'root'])) {
            return $this->redirect(array('action' => 'index'));
        }

        if (!$this->Survey->exists($id)) {
            throw new NotFoundException(__('Survey not found'));
        }

        $options = array('conditions' => array('Question.survey_id' => $id, 'Question.parent_q_id' => null));
        $this->set('q', $this->Survey->Question->find('first', $options));
    }

    public function delete($id = null)
    {
        if (!$this->Survey->exists($id)) {
            throw new NotFoundException(__('Invalid Survey'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Survey->delete($id)) {
            $this->Flash->success(__('The survey has been deleted.'));
        } else {
            $this->Flash->error(__('The survey could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function saveChildQs($q, $parentQId)
    {
        $this->Survey->Question->create();

        $savedQ = $this->Survey->Question->save([
            'question' => $q['question'],
            'survey_id' => $this->Survey->id,
            'on_yes_no' => $q['type'],
            'parent_q_id' => $parentQId,
        ]);

        if (isset($q['children'][0])) {
            $this->saveChildQs($q['children'][0], $savedQ['Question']['id']);
        }
        if (isset($q['children'][1])) {
            $this->saveChildQs($q['children'][1], $savedQ['Question']['id']);
        }
    }

    public function validateForm()
    {
        if ($this->RequestHandler->isAjax()) {
            // pr($this->request->data);
            $this->request->data['Survey'][$this->params['data']['field']] = $this->params['data']['value'];
            $this->Survey->set($this->request->data);
            if ($this->Survey->validates()) {
                $this->autoRender = false;
            } else {
                $error = $this->validateErrors($this->Survey);
                // pr($error['title']);
                $this->set('error', $error[$this->params['data']['field']][0]);
            }
        }
    }
}
