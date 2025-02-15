import * as THREE from 'three'
import { useGLTF } from '@react-three/drei'
import { GLTF } from 'three-stdlib'

type GLTFResult = GLTF & {
  nodes: {
    Curve002_1: THREE.Mesh
    Curve002_2: THREE.Mesh
  }
  materials: {
    Material: THREE.MeshStandardMaterial
    ['Material.001']: THREE.MeshStandardMaterial
  }
}

const Logos = (props: JSX.IntrinsicElements['group']) => {
  const { nodes, materials } = useGLTF('/3D/logo.glb') as GLTFResult
  return (
    <group {...props} dispose={null} scale={25}>
      <group position={[-1.906, -1.332, -0.229]} rotation={[Math.PI / 2, 0, 0]} scale={12.985}>
        <mesh
          castShadow
          receiveShadow
          geometry={nodes.Curve002_1.geometry}
          material={materials.Material}
        />
        <mesh
          castShadow
          receiveShadow
          geometry={nodes.Curve002_2.geometry}
          material={materials['Material.001']}
        />
      </group>
    </group>
  )
}

useGLTF.preload('/3D/logo.glb')

export default Logos