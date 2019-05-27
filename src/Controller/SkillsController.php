<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Skills Controller
 *
 * @property \App\Model\Table\SkillsTable $Skills
 *
 * @method \App\Model\Entity\Skill[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SkillsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        if ($this->request->is('post')) {
            if (!empty($this->request->getData('name'))) {
                $skill_name = $this->request->getData('name');
                $limit = 1000;
            } else {
                $skill_name = '';
                $limit = 10;
            }
        } else {
            $skill_name = '';
            $limit = 10;
        }
        $this->paginate = [
            'conditions' => array(
                'name LIKE' => '%' . $skill_name . '%'
            ),
            'limit' => $limit,
            'order' => [
                'name' => 'asc'
            ]
        ];
        $this->set('skills', $this->paginate($this->Skills));
        $this->set('_serialize', ['skills']);
    }

    /**
     * View method
     *
     * @param string|null $id Skill id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $skill = $this->Skills->get($id, [
            'contain' => []
        ]);

        $this->set('skill', $skill);
        $this->set('_serialize', ['skill']);

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $skill = $this->Skills->newEntity();
        if ($this->request->is('post')) {
            $skill = $this->Skills->patchEntity($skill, $this->request->getData());
            $skill['created_by'] = $this->Auth->user('id');
            if ($this->Skills->save($skill)) {
                $this->Flash->success(__('The skill has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The skill could not be saved. Please, try again.'));
        }
        $this->set(compact('skill'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Skill id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $skill = $this->Skills->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $skill = $this->Skills->patchEntity($skill, $this->request->getData());
            $skill['modified_by'] = $this->Auth->user('id');
            if ($this->Skills->save($skill)) {
                $this->Flash->success(__('The skill has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The skill could not be saved. Please, try again.'));
        }
        $this->set(compact('skill'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Skill id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /* public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $skill = $this->Skills->get($id);
        if ($this->Skills->delete($skill)) {
            $this->Flash->success(__('The skill has been deleted.'));
        } else {
            $this->Flash->error(__('The skill could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    } */

    public function checkSkillName($id = null) {
        $skill_name = $this->request->getData('name');
        if ($id != '') {
            $skillName = $this->Skills->find('all')->select(['name'])->where(['name' => $skill_name, 'NOT' => array('id' => $id)]);
        } else {
            $skillName = $this->Skills->find('all')->select(['name'])->where(['name' => $skill_name]);
        }
        $skillArr = $skillName->toArray();
        if (count($skillArr) > 0) {
            $dataArr['success'] = 'true';
        } else {
            $dataArr['success'] = 'false';
        }
        echo json_encode($dataArr);
        exit;
    }
}
