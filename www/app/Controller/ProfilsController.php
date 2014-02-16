<?php
App::uses('AppController', 'Controller');
/**
 * Profils Controller
 *
 * @property Profil $Profil
 * @property PaginatorComponent $Paginator
 */
class ProfilsController extends AppController {

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
		$this->Profil->recursive = 0;
		$this->set('profils', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Profil->exists($id)) {
			throw new NotFoundException(__('Invalid profil'));
		}
		$options = array('conditions' => array('Profil.' . $this->Profil->primaryKey => $id));
		$this->set('profil', $this->Profil->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Profil->create();
			if ($this->Profil->save($this->request->data)) {
				$this->Session->setFlash(__('The profil has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profil could not be saved. Please, try again.'));
			}
		}
		$members = $this->Profil->Member->find('list');
		$this->set(compact('members'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Profil->exists($id)) {
			throw new NotFoundException(__('Invalid profil'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Profil->save($this->request->data)) {
				$this->Session->setFlash(__('The profil has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profil could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Profil.' . $this->Profil->primaryKey => $id));
			$this->request->data = $this->Profil->find('first', $options);
		}
		$members = $this->Profil->Member->find('list');
		$this->set(compact('members'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Profil->id = $id;
		if (!$this->Profil->exists()) {
			throw new NotFoundException(__('Invalid profil'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Profil->delete()) {
			$this->Session->setFlash(__('The profil has been deleted.'));
		} else {
			$this->Session->setFlash(__('The profil could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
