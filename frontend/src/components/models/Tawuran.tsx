import React, { useRef } from "react";
import { useGLTF } from "@react-three/drei";
import { GroupProps, useFrame } from "@react-three/fiber";
import * as THREE from "three";

type GLTFResult = {
  nodes: {
    Object_4: THREE.Mesh;
  };
  materials: {
    Material: THREE.Material;
  };
};

type TawuranProps = GroupProps;

const Tawuran: React.FC<TawuranProps> = (props: TawuranProps) => {
  // Konversi 'useGLTF' hasil ke 'unknown' terlebih dahulu, lalu ke 'GLTFResult'
  const { nodes, materials } = useGLTF("/3D/celurit.glb") as unknown as GLTFResult;

  const groupRef = useRef<THREE.Group>(null);

  useFrame(() => {
    if (groupRef.current) {
      // Rotasi otomatis seluruh grup dari kiri ke kanan
      groupRef.current.rotation.y += 0.01;
    }
  });

  return (
    <group ref={groupRef} {...props} dispose={null}>
      <group rotation={[-Math.PI / 2, 0, 0]}>
        <mesh
          geometry={nodes.Object_4.geometry}
          material={materials.Material}
          scale={0.053} // Skala tetap
        />
      </group>
    </group>
  );
};

useGLTF.preload("/3D/celurit.glb");

export default Tawuran;
