<?php
App::uses('AppController', 'Controller');
/**
 * Girls Controller
 *
 * @property Girl $Girl
 * @property PaginatorComponent $Paginator
 */
class GirlsController extends AppController {

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
	public function index() {
		$this->Girl->recursive = 0;
		$this->set('girls', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Girl->exists($id)) {
			throw new NotFoundException(__('Invalid girl'));
		}
		$options = array('conditions' => array('Girl.' . $this->Girl->primaryKey => $id));
		$this->set('girl', $this->Girl->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Girl->create();
			if ($this->Girl->save($this->request->data)) {
				$this->Session->setFlash(__('The girl has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The girl could not be saved. Please, try again.'));
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
	public function edit($id = null) {
		if (!$this->Girl->exists($id)) {
			throw new NotFoundException(__('Invalid girl'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Girl->save($this->request->data)) {
				$this->Session->setFlash(__('The girl has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The girl could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Girl.' . $this->Girl->primaryKey => $id));
			$this->request->data = $this->Girl->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Girl->id = $id;
		if (!$this->Girl->exists()) {
			throw new NotFoundException(__('Invalid girl'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Girl->delete()) {
			$this->Session->setFlash(__('The girl has been deleted.'));
		} else {
			$this->Session->setFlash(__('The girl could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
