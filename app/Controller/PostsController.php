<?php

class PostsController extends AppController {
	
	public $helpers = array('Html', 'Form');
	
	var $components = array('Search.Prg');
	
	var $presetVars = true;
	
	public $pagenate = array(
		'posts' => array(
			'limit' => 20,
			'order' => array('id' => 'asc'),
		)
	);
	
	//
	// 投稿一覧の表示
	//
	public function index() {
		
	/*
		$this->set('posts', $this->Post->find('all'));
		$this->set('title_for_layout', '論文一覧');
		*/
	}

	public function search() {
		$this->Post->recursive = 0;
        $this->Prg->commonProcess();
        $this->paginate = array(
            'conditions' => $this->Post->parseCriteria($this->passedArgs),
        );
        $this->set('posts', $this->paginate());
	}

	//
	// 投稿の表示
	//
	// @param ($id)		投稿のID	
	public function view($id = null) {
		$this->Post->id = $id;
		$data = $this->Post->read();
		if (array_key_exists('Post', $data)) {
			$this->set('post', $this->Post->read());
		}
		else {
			$this->redirect(array('action' => 'index'));
		}
	}
	
	//
	// 解説を投稿
	//
	public function add() {
		if ($this->request->is('post')) {
			if ($this->Post->save($this->request->data)) {
				// 成功				
				$this->Session->setFlash('Successed');
				$this->redirect(array('action' => 'index'));
			}
			else {
				// 失敗
				$this->Session->setFlash('failed!');
			}
		}
	}
	
	//
	// 解説を編集
	//
	// @param ($id)		投稿のID
	public function edit($id = null) {
		$this->Post->id = $id;
		
		// 編集ページリクエスト
		if ($this->request->is('get')) {
			$this->request->data = $this->Post->read();
		}
		// 編集完了
		else {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash('successed');
				$this->redirect(array('action' => 'view', $id));
			}
			else {
				$this->Session->setFlash('failed');
			}
		}
	}
	
	//
	// 投稿を削除
	//
	// @param ($id)		投稿のID
	public function delete($id = null) {
		$this->Post->id = $id;
		
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		if ($this->request->is('ajax')) {
			if ($this->Post->delete($id)) {
				$this->autoRender = false;
				$this->autoLayout = false;
				$response = array('id' => $id);
				$this->header('Content-Type: application/json');
				echo json_encode($response);
				exit();
			}
		}
		$this->redirect(array('action'=>'index'));
	}
	
}