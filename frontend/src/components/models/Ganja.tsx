import { useRef} from 'react';
import { useGLTF } from '@react-three/drei';
import { useFrame } from '@react-three/fiber';
import { GLTF } from 'three-stdlib';
import * as THREE from 'three';

type GLTFResult = GLTF & {
  nodes: {
    WeedBag2_Weed_0: THREE.Mesh;
    WeedBag2_Ziploc_0: THREE.Mesh;
  };
  materials: {
    Weed: THREE.MeshStandardMaterial; // Ganti dengan tipe material yang sesuai
    Ziploc: THREE.MeshStandardMaterial; // Ganti dengan tipe material yang sesuai
  };
};

const Ganja = (props: JSX.IntrinsicElements["group"]) => {
  const { nodes, materials } = useGLTF('/3D/ganja.glb') as GLTFResult;
  const meshRef = useRef<THREE.Group>(null); // Menggunakan ref untuk grup

  // Animasi rotasi
  useFrame(() => {
    if (meshRef.current) {
      meshRef.current.rotation.y += 0.01; // Rotate the group continuously
    }
  });

  return (
    <group {...props} dispose={null} ref={meshRef}>
      <group scale={0.01}>
        {/* Mengubah posisi y menjadi sedikit lebih rendah, misalnya 8.0 */}
        <group position={[0, -7.0, 0]} rotation={[Math.PI / 2, 0, Math.PI]} scale={140}>
          <mesh
            castShadow
            receiveShadow
            geometry={nodes.WeedBag2_Weed_0.geometry}
            material={materials.Weed}
          />
          <mesh
            castShadow
            receiveShadow
            geometry={nodes.WeedBag2_Ziploc_0.geometry}
            material={materials.Ziploc}
          />
        </group>
      </group>
    </group>
  );
}

useGLTF.preload('/3D/ganja.glb');

export default Ganja;
