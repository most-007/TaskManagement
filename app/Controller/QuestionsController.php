<?php
App::uses('AppController', 'Controller');
/**
 * Questions Controller
 *
 * @property Question $Question
 * @property PaginatorComponent $Paginator
 */
class QuestionsController extends AppController
{

/**
 * Components
 *
 * @var array
 */
    public $components = array('Paginator');

    public function getNextQuestion($id, $answerIndex)
    {
        $this->autoRender = false;
        $options = array('conditions' => array(
            'Question.parent_q_id' => $id,
            'Question.on_yes_no' => $answerIndex == 0 ? "y" : "n",
        ));
        $q = $this->Question->find('first', $options);
        if (isset($q['Question'])) {
            return json_encode($q['Question']);
        }
    }

/**
 * index method
 *
 * @return void
 */
    public function index()
    {
        $this->Question->recursive = 0;
        $this->set('questions', $this->Paginator->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null)
    {
        if (!$this->Question->exists($id)) {
            throw new NotFoundException(__('Invalid question'));
        }
        $options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
        $this->set('question', $this->Question->find('first', $options));
    }

/**
 * add method
 *
 * @return void
 */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Question->create();
            if ($this->Question->save($this->request->data)) {
                $this->Flash->success(__('The question has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The question could not be saved. Please, try again.'));
            }
        }
        $surveys = $this->Question->Survey->find('list');
        $parentQs = $this->Question->ParentQ->find('list');
        $this->set(compact('surveys', 'parentQs'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null)
    {
        if (!$this->Question->exists($id)) {
            throw new NotFoundException(__('Invalid question'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Question->save($this->request->data)) {
                $this->Flash->success(__('The question has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The question could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
            $this->request->data = $this->Question->find('first', $options);
        }
        $surveys = $this->Question->Survey->find('list');
        $parentQs = $this->Question->ParentQ->find('list');
        $this->set(compact('surveys', 'parentQs'));
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null)
    {
        if (!$this->Question->exists($id)) {
            throw new NotFoundException(__('Invalid question'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Question->delete($id)) {
            $this->Flash->success(__('The question has been deleted.'));
        } else {
            $this->Flash->error(__('The question could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
