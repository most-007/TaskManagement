<?php
App::uses('AppController', 'Controller');
/**
 * Answers Controller
 *
 * @property Answer $Answer
 * @property PaginatorComponent $Paginator
 */
class AnswersController extends AppController
{

/**
 * Components
 *
 * @var array
 */
    public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
    public function index()
    {
        $this->Answer->recursive = 0;
        $this->set('answers', $this->Paginator->paginate());
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
        if (!$this->Answer->exists($id)) {
            throw new NotFoundException(__('Invalid answer'));
        }
        $options = array('conditions' => array('Answer.' . $this->Answer->primaryKey => $id));
        $this->set('answer', $this->Answer->find('first', $options));
    }

/**
 * add method
 *
 * @return void
 */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->autoRender = false;

            $this->Answer->create();
            $answer = [
                'user_id' => $this->Auth->user('id'),
                'question_id' => (int) $this->request->data['qid'],
                'answer' => $this->request->data['answer'],
                'notes' => $this->request->data['notes'] ? $this->request->data['notes'] : "",
            ];
            $savedAns = $this->Answer->save($answer);

            // debug($this->Answer->validationErrors); //show validationErrors
            // debug($this->Answer->getDataSource()->getLog(false, false)); //show last sql query

            if (!$savedAns) {
                $this->Flash->error(__('The ans could not be saved. Please, try again.'));
            } else {
                $this->Flash->success('Survey completed successfully. Thank you!', ['clear' => true]); //clear is used to prevent flashing msg twice

            }

        }
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
        if (!$this->Answer->exists($id)) {
            throw new NotFoundException(__('Invalid answer'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Answer->save($this->request->data)) {
                $this->Flash->success(__('The answer has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The answer could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Answer.' . $this->Answer->primaryKey => $id));
            $this->request->data = $this->Answer->find('first', $options);
        }
        $questions = $this->Answer->Question->find('list');
        $users = $this->Answer->User->find('list');
        $this->set(compact('questions', 'users'));
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
        if (!$this->Answer->exists($id)) {
            throw new NotFoundException(__('Invalid answer'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Answer->delete($id)) {
            $this->Flash->success(__('The answer has been deleted.'));
        } else {
            $this->Flash->error(__('The answer could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
